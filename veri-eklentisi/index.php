<?php

/*
Plugin Name: veri eklentim
Plugin URI : https://github.com/sedanurakcil
Description:Bu benim veri eklentim 
Version :1.0
Author: Sedanur Akçil
Author URI: https://github.com/sedanurakcil

*/

// menü ekledik
add_action("admin_menu","eklentim") ; //istediğimiz fonksiyonu istediğimiz menüye eklememizi sağlar.

function eklentim(){
    add_menu_page("Eklenti Başlığım ","Eklenti Adım","manage_options","eklenti_linkim","eklenti_icerigi");

}
function eklenti_icerigi(){
    
     query_posts($query_string . 'orderby=rand&&showposts=5'); 
    if(have_posts()) : 
        
    while(have_posts()) : the_post(); 
    the_title(); echo",  " ;
    the_permalink(); echo ",  " ;
    the_date();echo ",  ";
        
    the_content();
    echo "<br />" ;
    
    endwhile; 
    endif;
    






}


?> 


