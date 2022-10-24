
<meta charset="UTF-8">

<?php
/*
*Plugin Name: Light Döviz İşlemleri
*Plugin URI : https://github.com/sedanurakcil
*Description:TL DÖVİZ EKLENTİM
*Version :0.01
*Author: Sedanur Akçil
*Author URI: https://github.com/sedanurakcil

*/

// menü ekledik


add_action("admin_menu","eklentim") ; //istediğimiz fonksiyonu istediğimiz menüye eklememizi sağlar.

function eklentim(){
    add_menu_page("Eklenti Başlığım ","Eklenti Adım","manage_options","eklenti_linkim","eklenti_icerigi");

}
function eklenti_icerigi(){?>

<head>
<body>

        DÖVİZ İŞLEMLERİ
        <form action = "" method = "POST">

        <input class = "number" type = "number" name= "TL" required = "" placeholder= "Lütfen TL tutarınızı giriniz."><br><br>
        
        <select input = "text" name = "islem" required = "">

        <option value ="Euro">Euro</option>
        <option value ="Dolar">Dolar</option>
       
    </select>
     <input  class = "buton" type = "submit" value = "ÇEVİR">
     <br> SONUÇ : <?php  

    $kur = simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml");

    $dolar = $kur->Currency[0]->BanknoteSelling;
    $euro = $kur->Currency[3]->BanknoteSelling;

    
    $islem = $_POST['islem'];
    $TL = $_POST['TL'];

    $islem = strip_tags($islem);
    $TL = strip_tags($TL);

    if($islem == null){
        echo "Please choose";
    }
        else{
    if(is_numeric($TL)){

    
        if($islem == "Euro"){
        $result = $TL /$euro;
        $result=   number_format_i18n( $result, 3 ) ." Euro";
       echo  esc_html__($result, $textdomain = 'default' );

        }  else if($islem == "Dolar"){

        $result = $TL / $dolar;
        $result =  number_format_i18n( $result, 3 ) ." Dolar";
       echo  esc_html__($result, $textdomain = 'default');
        }

}
else{
    echo "Please enter numeric value !!!";
}
        }
}
?>
    
</head>
</body>




    
    
