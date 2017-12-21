<?php

error_reporting(0);
require "simple_html_dom.php";

function ara($stringUrl,$stringKelime)
{
    $kelimesayac=0;
    $index=0;

    while (($index = strpos($stringUrl, $stringKelime, $index)) !== false)
    {

        $onceki = substr($stringUrl, $index-1 , 1);
        $sonraki = substr($stringUrl, $index + strlen($stringKelime), 1);



        $sonuc=strcmp($onceki, "a"); //esitse 0 donduruyor
        $sonuc1=strcmp($onceki, "b") ;
        $sonuc2=strcmp($onceki, "c")  ;
        $sonuc3=strcmp($onceki, "d")  ;
        $sonuc4=strcmp($onceki, "e")  ;
        $sonuc5=strcmp($onceki, "f")  ;
        $sonuc6=strcmp($onceki, "g")  ;
        $sonuc7=strcmp($onceki, "h") ;
        $sonuc8=strcmp($onceki, "j")  ;
        $sonuc9=strcmp($onceki, "k")  ;
        $sonuc10=strcmp($onceki, "l")  ;
        $sonuc11=strcmp($onceki, "m")  ;
        $sonuc12=strcmp($onceki, "n")  ;
        $sonuc13=strcmp($onceki, "o")  ;
        $sonuc14=strcmp($onceki, "p")  ;
        $sonuc15=strcmp($onceki, "r")  ;
        $sonuc16=strcmp($onceki, "s")  ;
        $sonuc17=strcmp($onceki, "t")  ;
        $sonuc18=strcmp($onceki, "u")  ;
        $sonuc19=strcmp($onceki, "v")  ;
        $sonuc20=strcmp($onceki, "y")  ;
        $sonuc21=strcmp($onceki, "z") ;
        $sonuc22=strcmp($onceki, "i") ;

        $sonuc23=strcmp($sonraki, "a"); //esitse 0 donduruyor
        $sonuc24=strcmp($sonraki, "b") ;
        $sonuc25=strcmp($sonraki, "c")  ;
        $sonuc26=strcmp($sonraki, "d")  ;
        $sonuc27=strcmp($sonraki, "e")  ;
        $sonuc28=strcmp($sonraki, "f")  ;
        $sonuc29=strcmp($sonraki, "g")  ;
        $sonuc30=strcmp($sonraki, "h") ;
        $sonuc31=strcmp($sonraki, "j")  ;
        $sonuc32=strcmp($sonraki, "k")  ;
        $sonuc33=strcmp($sonraki, "l")  ;
        $sonuc34=strcmp($sonraki, "m")  ;
        $sonuc35=strcmp($sonraki, "n")  ;
        $sonuc36=strcmp($sonraki, "o")  ;
        $sonuc37=strcmp($sonraki, "p")  ;
        $sonuc38=strcmp($sonraki, "r")  ;
        $sonuc39=strcmp($sonraki, "s")  ;
        $sonuc40=strcmp($sonraki, "t")  ;
        $sonuc41=strcmp($sonraki, "u")  ;
        $sonuc42=strcmp($sonraki, "v")  ;
        $sonuc43=strcmp($sonraki, "y")  ;
        $sonuc44=strcmp($sonraki, "z") ;
        $sonuc45=strcmp($sonraki, "i") ;

        if(
            $sonuc==0 ||
            $sonuc1==0 ||
            $sonuc2==0 ||
            $sonuc3==0 ||
            $sonuc4==0||
            $sonuc5==0||
            $sonuc6==0||
            $sonuc7==0 ||
            $sonuc8==0 ||
            $sonuc9==0 ||
            $sonuc10==0 ||
            $sonuc11==0||
            $sonuc12==0||
            $sonuc13==0||
            $sonuc14==0||
            $sonuc15==0||
            $sonuc16==0||
            $sonuc17==0||
            $sonuc18==0||
            $sonuc19==0||
            $sonuc20==0||
            $sonuc21==0||
            $sonuc22==0||
            $sonuc23==0||
            $sonuc24==0||
            $sonuc25==0||
            $sonuc26==0||
            $sonuc27==0||
            $sonuc28==0||
            $sonuc29==0||
            $sonuc30==0||
            $sonuc31==0||
            $sonuc32==0||
            $sonuc33==0||
            $sonuc34==0||
            $sonuc35==0||
            $sonuc36==0||
            $sonuc37==0||
            $sonuc38==0||
            $sonuc39==0||
            $sonuc40==0||
            $sonuc41==0||
            $sonuc42==0||
            $sonuc43==0||
            $sonuc44==0||
            $sonuc45==0)

        {
            $index++;
        }
        else
        {
            $kelimesayac++;
            $index++;

        }



    }
    echo "kelime sayisi ve kelime : ". $kelimesayac;
    return $kelimesayac;
}



if(isset($_POST['kelime1'])) {

    $url = $_POST['url1'];


    $urlsayi=substr_count($url, ' ')+1;
   // echo " url sayisi --->>>> ",$url,"~",$urlsayi," - ";

    $dizi_url = explode (" ",$url);
    $kelimeler=array();
    $scor_dizisi=array();
    $scor_url_adi==array();
    $tut=0;


    for($u=0;$u<$urlsayi;$u++)
    {



        $kelime = $_POST['kelime1'];
        //Burada  html kaynağını okuyacağımız siteyi file_get_html fonksiyonuna gönderdiyoruz
        $html = file_get_html($dizi_url[$u]);

        $stringUrl = (string)$html;
        $stringKelime = (string)$kelime;
        $index = 0;
        $kelimesayac = 0;
        $stringUrl = strtolower($stringUrl);
       // echo '<br>'," aranacakurl ---> ",$stringUrl,'<br>';

        $kelimesayi=str_word_count($stringKelime);

        $degerler=0;
        //$degerlerU=0;


        $dizi = explode (" ",$stringKelime);



        for($i=0;$i<$kelimesayi;$i++)
        {
            $kelimeler[$i]=ara($stringUrl,$dizi[$i]);
            echo  " - ",$dizi[$i],'<br>';


        }

        $urlscor=skor($kelimeler,$kelimesayi);

        echo  " Aranan URL ---> ",$dizi_url[$u],"  ---- Scor --> ",$urlscor;

        $scor_url_adi[$u]=$dizi_url[$u];
        $scor_url[$u]=$urlscor;


        echo '<br>',"---------------------------------------------------------------------------------------",'<br>','<br>';





    }



    echo "---------- URL Siralamasi ---------- ";




    $algel=selectionSort($scor_url,$scor_url_adi,$urlsayi);
    sort($scor_url);

            for($i=$urlsayi-1;$i>=0;$i--){

                echo '<br>',$i+1,".URL ----> ",$algel[$i],"  ----------> ",$scor_url[$i],'<br>';

            }


}


function selectionSort($array,$url,$don) {


    for ($j = 0; $j < $don; $j++) {
        $iMin = $j;
        for ($i = $j; $i < $don; $i++) {
            if ($array[$i] < $array[$iMin]) {
                $iMin = $i;
            }
        }
        if ($iMin != $j) {
            // swap
            $temp = $array[$j];
            $temp2=$url[$j];
            $array[$j] = $array[$iMin];
            $url[$j]=$url[$iMin];
            $array[$iMin] = $temp;
            $url[$iMin]=$temp2;
        }


    }
    return $url;
}





function skor($kelimeler,$kelimesayi){

    $toplampuan=0;
    if($kelimesayi==1)
    {

        $toplampuan=$kelimeler[0];
    }else{

        for($i=0;$i<$kelimesayi;$i++){


            for($j=$i+1;$j<$kelimesayi;$j++){


                $islem=($kelimeler[$i]-$kelimeler[$j]);
                if($islem<0)
                    $islem=$islem*-1;


                $puan=(($islem/1)*10);

                $toplampuan=$toplampuan+$puan;

            }

        }
    }


    return $toplampuan;

}











//input type="text" name="url4">





?>



<link rel="stylesheet" href="style.css">
<form method="post">
    <div class="asama">arama-2</div>
    <div class="container">

        <div class="search-box" id="SBox">
            <input type="text" id="search" name="kelime1" placeholder="Kelime giriniz"><br><br>

            <input type="text" id="search" name="url1" placeholder="URL giriniz">

            <button type="submit" class="button1" name="gonder1" ><a> ARA </a></button>

        </div>

    </div>
</form>


<!--<form method="post">
    Kelime Girin<input type="text" name="kelime1"placeholder="kelime girin">
    Url Girin<textarea rows="1" cols="25" name="url1"></textarea>
    <input type="submit" name="gonder1" value="Gonder">


    <br>

</form>