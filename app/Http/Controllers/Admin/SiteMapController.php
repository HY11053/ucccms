<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SiteMapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }
    /**
     * PC端地图、、生成
     * @param
     *
     * @return
     */
    function Index()
    {
        $appurl=config('app.url');
        $typedirs=Arctype::pluck('real_path');
        $urllinks=Archive::where('published_at','<=',Carbon::now())->where('ismake',1)->get();
        $sitemapinfos="<?xml version=\"1.0\" encoding=\"utf-8\"?>
        <urlset><url>
        <loc>$appurl</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
        </url>";
        foreach ($typedirs as $typedir){
            $sitemapinfos.="<url>
                <loc>$appurl/$typedir/</loc>
                <changefreq>daily</changefreq>                
                <priority>1.0</priority>
            </url>";
        }
        foreach ($urllinks as $urllink){
            $sitemapinfos.="<url>
                <loc>$appurl/{$urllink->arctype->real_path}/{$urllink->id}.shtml</loc>
                <lastmod>".date('Y-m-d',strtotime($urllink->updated_at))."</lastmod>
                <changefreq>daily</changefreq>
                <priority>1.0</priority>
            </url>";
        }
        $sitemapinfos.='</urlset>';
        if(Storage::disk('public')->put('sitemap.xml', $sitemapinfos)){
            $msg= 'XML文件生成成功';
        }else{
            $msg= '文件生成失败@';
        }
        return view('admin.sitemapcreate',compact('msg'));
    }

    /**
     * 移动端地图生成
     * @param
     *
     * @return
     */

    function MobileSitemap()
    {
        $appurl=config('app.url');
        $mappurl=str_replace('http://www.','http://m.',$appurl);
        $typedirs=Arctype::pluck('real_path');
        $urllinks=Archive::where('published_at','<=',Carbon::now())->where('ismake',1)->get();
        $sitemapinfos="<?xml version=\"1.0\" encoding=\"UTF-8\" ?> 
        <urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
        xmlns:mobile=\"http://www.baidu.com/schemas/sitemap-mobile/1/\"> 
        <url> 
        <loc>$mappurl</loc> 
        <mobile:mobile type=\"mobile\"/>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
        </url> 
        <url> 
        <loc>$appurl</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
        </url>
        ";
        foreach ($typedirs as $typedir){
            $sitemapinfos.="<url> 
            <loc>$mappurl/$typedir/</loc> 
            <mobile:mobile type=\"mobile\"/>
            <changefreq>daily</changefreq>
            <priority>1.0</priority>
            </url> 
            <url>
                <loc>$appurl/$typedir/</loc>
                <changefreq>daily</changefreq>                
                <priority>1.0</priority>
            </url>          
            ";
        }

        foreach ($urllinks as $urllink){
            $sitemapinfos.="<url> 
            <loc>$mappurl/{$urllink->arctype->real_path}/{$urllink->id}.shtml</loc> 
            <mobile:mobile type=\"mobile\"/>
            <lastmod>".date('Y-m-d',strtotime($urllink->updated_at))."</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
            </url> 
            <url>
                <loc>$appurl/{$urllink->arctype->real_path}/{$urllink->id}.shtml</loc>
                <lastmod>".date('Y-m-d',strtotime($urllink->updated_at))."</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>
            ";

        }
        $sitemapinfos.='</urlset>';
        if(Storage::disk('public')->put('mobilesitemap.xml', $sitemapinfos)){
            $msg= 'XML文件生成成功';
        }else{
            $msg= '文件生成失败@';
        }
        return view('admin.sitemapcreate',compact('msg'));
    }
}
