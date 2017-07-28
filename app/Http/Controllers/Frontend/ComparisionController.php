<?php

namespace App\Http\Controllers\Frontend;

use App\AdminModel\Addonarticle;
use App\AdminModel\Archive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComparisionController extends Controller
{

    function Compare($p1=0,$p2=0,$p3=0)
    {
        $cbrand1=Archive::find($p1);
        $cbrand2=Archive::find($p2);
        $cbrand3=Archive::find($p3);
        return view('frontend.pk',compact('cbrand1','cbrand2','cbrand3'));
    }
    function demo(){
        for($i=1;$i<Archive::max('id');$i++)
        {
            if(Archive::find($i))
            {
              $description=str_limit(mb_ereg_replace('^(　| )+','', preg_replace('/\r|\n/', '', trim(strip_tags(htmlspecialchars_decode(Addonarticle::where('id',$i)->value('body')))))), $limit = 300, $end = '');

              Archive::where('id',$i)->update(['description'=>$description]);

            }
        }
    }
    function demo2()
    {
        $urls=Archive::where('ismake',1)->get();
        return view('frontend.demo2',compact('urls'));
    }
    function demo3()
    {
        for ($i=0;$i<count(Archive::where('ismake',1)->get());$i++)
        {
            Addonarticle::where('id',$i)->update([
                'body'=>$this->ImageInformation(Addonarticle::where('id',$i)->value('body'),Archive::where('id',$i)->value('shorttitle')?Archive::where('id',$i)->value('shorttitle'):Addonarticle::where('id',$i)->value('brandname'),Archive::where('id',$i)->value('title')),
                'jmxq_content'=>$this->ImageInformation(Addonarticle::where('id',$i)->value('jmxq_content'),Archive::where('id',$i)->value('shorttitle')?Archive::where('id',$i)->value('shorttitle'):Addonarticle::where('id',$i)->value('brandname'),Archive::where('id',$i)->value('title')),
                'jmlc_content'=>$this->ImageInformation(Addonarticle::where('id',$i)->value('jmlc_content'),Archive::where('id',$i)->value('shorttitle')?Archive::where('id',$i)->value('shorttitle'):Addonarticle::where('id',$i)->value('brandname'),Archive::where('id',$i)->value('title')),
                'jmys_content'=>$this->ImageInformation(Addonarticle::where('id',$i)->value('jmys_content'),Archive::where('id',$i)->value('shorttitle')?Archive::where('id',$i)->value('shorttitle'):Addonarticle::where('id',$i)->value('brandname'),Archive::where('id',$i)->value('title')),
                'jmzc_content'=>$this->ImageInformation(Addonarticle::where('id',$i)->value('jmzc_content'),Archive::where('id',$i)->value('shorttitle')?Archive::where('id',$i)->value('shorttitle'):Addonarticle::where('id',$i)->value('brandname'),Archive::where('id',$i)->value('title')),
                'jmask_content'=>$this->ImageInformation(Addonarticle::where('id',$i)->value('jmask_content'),Archive::where('id',$i)->value('shorttitle')?Archive::where('id',$i)->value('shorttitle'):Addonarticle::where('id',$i)->value('brandname'),Archive::where('id',$i)->value('title')),
            ]);
        }

    }
    public function xgsearch()
    {
        $articles=Archive::where('shorttitle','<>','')->pluck('shorttitle','id');
        foreach ($articles as $key=>$article){
            if(empty(Addonarticle::where('id',$key)->value('bdxg_search'))){
                $baiduurl='http://www.baidu.com/s?ie=utf-8&wd='.$article;
                $mbaiduurl='https://m.baidu.com/ssid=37eed2bbb8f6bfd3b6f8d2d13c2f/from=844b/s?word='.$article;
                $baiduinfos=$this->getTagData($this->Curls($baiduurl),'<div class="tt">相关搜索','</table></div>');
                preg_match_all('#<a\b[^>]*\bhref=([^\s>]+)[^>]*>[\s\S]*?([^<>]*)</a>#', $baiduinfos,$matches);
                $baiduinfos=$matches[2];
                $mbdinfos=$this->getTagData($this->Curls($mbaiduurl),'<div id="relativewords" class="se-relativewords"><div class="rw-title">相关搜索','</div></div><div id="page-rcol" class="se-page-rcol"><div id="reword" class="se-reword"><div class="rw-title">相关搜索</div>');
                preg_match_all('#<a\b[^>]*\bhref=([^\s>]+)[^>]*>[\s\S]*?([^<>]*)</a>#',$mbdinfos,$matches);
                $mbdinfos=$matches[2];
                if(!empty($baiduinfos) || !emptyArray($mbdinfos)){
                    $xgarrs=array_filter(array_unique(array_merge($baiduinfos,$mbdinfos)));
                    //dd($xgarrs);
                    $xgsearch='';
                    foreach ($xgarrs as $xgarr){
                        $xgsearch.=$xgarr.',';
                    }
                    Addonarticle::where('id',$key)->update(['bdxg_search'=>$xgsearch]);
                }
            }


        }
        //dd($articles);


    }
    function Curls($url)
    {
        $curl=curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        $rs=curl_exec($curl);
        curl_close($curl);
        return $rs;
    }
    /**
     * 数据截取
     * @param
     *
     * @return
     */
    function getTagData($str, $start, $end)
    {
        if ( $start == '' || $end == '' )
        {
            return;
        }
        $str = explode($start, $str);
        if (isset($str[1]))
        {
            $str = explode($end, $str[1]);
            return $str[0];
        }else{
            return '';
        }


    }
    function ImageInformation($content,$title,$fulltitle)
    {
        preg_match('/<img.+(title=\".*?\").+>/i',$content,$match);
        if (empty($match))
        {
            return $content;
        }
        preg_match('/<img.+(alt=\".*?\").+>/i',$content,$match2);
        //dd($match2);
        if (empty($match2))
        {
            return $content;
        }

        $patterns=array();
        $replacement=array();
        $patterns[0]=$match[1];
        $patterns[1]=$match2[1];
        $title=empty($title)?$fulltitle:$title;
        $replacement[0]='title="'.$title.'"';
        $replacement[1]='alt="'.$title.'"';
        //dd($patterns[0]);
        $content=str_replace($patterns[0],$replacement[0],$content);
        $content=str_replace($patterns[1],$replacement[1],$content);
        return $content;
    }

}

