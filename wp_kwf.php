<?php
/**
 * @package Webchin Kurdish Webfonts
 * @version 1.0.1
 */
/*
Plugin Name: Webchin Kurdish Webfonts
Plugin URI: http://www.webchin.org/Meko/viewtopic.php?id=32543
Description: ئەو پێوەکراوە تایبەتە بە ماڵپەڕی وێبچن بۆ وۆڕدپرێس، کە پێکهاتووە لە ٩٨ دانە فۆنت بۆ ڕازاندنەوەی ماڵپەڕی وۆڕدپرێس، هەروەها بۆ هەڵبژاردنی فۆنتی جۆراو جۆر بۆ دانە بە دانەی ڕستەکانی نێو بابەتەکان.
Author: هەڵپەست
Version: 1.0.1
Author URI: http://www.webchin.org/Meko/profile.php?id=22995	**You MUST BE LOGGED IN

*/

/*  Copyright 2014  Helbest  (email : kurdinfo@gmail.com.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


	function tinymce_add_buttons($buttons)  // ڕێزبەندکردنی فۆنتەکان لە دەستکاریکەری بابەت.
	{
	 $buttons[] = 'fontselect';
	 $buttons[] = 'fontsizeselect';
	
	 return $buttons;
	}
	add_filter("mce_buttons_3", "tinymce_add_buttons");
	

	function __construct() // بۆ دابینکردنی داخوازی کردارەکان.
	{
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'content_save_pre', array( $this, 'content_save_pre'), 100 ); 
	}
	
	function admin_init()  // دروستکراوەکان لەبەشی بەڕێوەبەرایەتی بکە ناو tinymce.
	{
		add_filter( 'font_formats', array( $this, 'font_formats' ) );
	}
	
	function content_save_pre( $content ) // داخوازەکان پاشەکەوت بکە بۆ کردارەکان.
	{
		if ( substr( $content, -8 ) == '</table>' )
			$content = $content . "\n<br />";
		
		return $content;
	}


	/*
     * register with hook 'wp_print_styles'
     */
    add_action('admin_print_styles', 'bene_kwf_rwxisar');
	add_action('wp_print_styles', 'bene_kwf_rwxisar');

    /*
     * Enqueue style-file, if it exists.
     */

    function bene_kwf_rwxisar() {  // بانگکردنی ڕوخسار بۆ نێو ماڵپەڕ لەکاتی بەکارهێنانی فۆنتەکانی وێبچن.
        $myStyleUrl = plugins_url('wp-kwf.css', __FILE__); // بەلەبەر چاوگرتنی س س ل بۆ پەڕگەی ڕوخسار.
        $myStyleFile = WP_PLUGIN_DIR . '/webchin-kurdish-webfonts/wp-kwf.css';
		wp_enqueue_style( 'helbest', get_template_directory_uri() . '/helbest.css' ); // دەستکاری دامەزراو لەناو بوخچەی ڕووکار
        if ( file_exists($myStyleFile) ) {
            wp_register_style('WebchinWebFonts', $myStyleUrl);
            wp_enqueue_style( 'WebchinWebFonts');
        }
    }
	
	function webchin_kwf_kirdari_dabes( $das ) {  // کرداری دابەشکردنی فۆنتەکانی وێبچن خرایە ئەو بەشە.

	$das['font_formats'] = 'قەیدار هەمزە=UniQAIDAR_7EMZE, sans-serif;قەیدار ئەحمەد=UniQAIDAR_A7MED, sans-serif;قەیدار عەبدوڵا=UniQAIDAR_ABDULLAH, sans-serif;قەیدار ئەبو زەبی=UniQAIDAR_ABO DHABI, sans-serif;قەیدار ئەخباریە=UniQAIDAR_AKHBARIA, sans-serif;قەیدار عەلی=UniQAIDAR_ALI, sans-serif;قەیدار ئەسکەندەر=UniQAIDAR_ASKANDAR, sans-serif;قەیدار ئەرەبیە=UniQAIDAR_Arabyeh, sans-serif;قەیدار ئارامکۆ=UniQAIDAR_Aramco, sans-serif;قەیدار ئاسۆ=UniQAIDAR_Aso, sans-serif;قەیدار ئاسیا=UniQAIDAR_Asya, sans-serif;قەیدار بەهمەن=UniQAIDAR_BEHMEN, sans-serif;قەیدار بێخود=UniQAIDAR_BEXUD, sans-serif;قەیدار دارا=UniQAIDAR_DARA, sans-serif;قەیدار دیگیتاڵ=UniQAIDAR_DIGITAL, sans-serif;قەیدار دوانگە=UniQAIDAR_DWANGE, sans-serif;قەیدار ئەدەب=UniQAIDAR_EDEB, sans-serif;قەیدار ئیبراهیم=UniQAIDAR_Ebrahim, sans-serif;قەیدار ئەفریکا=UniQAIDAR_Efriqa, sans-serif;قەیدار ئەفسون=UniQAIDAR_Efsun, sans-serif;قەیدار هێمن=UniQAIDAR_Hemin, sans-serif;قەیدار جونەید=UniQAIDAR_JWNEYD, sans-serif;قەیدار کامەران=UniQAIDAR_KAMARAN, sans-serif;قەیدار کارمەند=UniQAIDAR_KARMEND, sans-serif;قەیدار کاروان=UniQAIDAR_KARWAN, sans-serif;قەیدار خامە=UniQAIDAR_KHAMA, sans-serif;قەیدار کوفی=UniQAIDAR_Kufi, sans-serif;قەیدار مۆبایل تی ڤی=UniQAIDAR_MOBILE_TV, sans-serif;قەیدار موحەمەد=UniQAIDAR_MUHAMMAD, sans-serif;قەیدار مێژوو=UniQAIDAR_Meju, sans-serif;قەیدار نەوا=UniQAIDAR_NAWA, sans-serif;قەیدار عومەر=UniQAIDAR_OMAR, sans-serif;قەیدار پەیام=UniQAIDAR_PAYAM, sans-serif;قەیدار پێنجوێن=UniQAIDAR_PENJWEN, sans-serif;قەیدار پۆستەر=UniQAIDAR_POSTER, sans-serif;قەیدار سامان=UniQAIDAR_SAMAN, sans-serif;قەیدار سامی=UniQAIDAR_SAMi, sans-serif;قەیدار توانا=UniQAIDAR_TWANA, sans-serif;قەیدار تەیف=UniQAIDAR_Taef, sans-serif;قەیدار تێکستێ=UniQAIDAR_TeXtE, sans-serif;قەیدار یەڵدا=UniQAIDAR_YELDA, sans-serif;قەیدار یوسوف=UniQAIDAR_YUSUF, sans-serif;قەیدار زانا=UniQAIDAR_ZANA, sans-serif;ئەمیری ئاسایی=Amiri, sans-serif;دەژەڤو سانس=DejaVu Sans, sans-serif;درۆید کوفی=Droid Arabic Kufi, sans-serif;درۆید نەسخ=Droid Arabic Naskh, sans-serif;یونیکورد چیمەن=Unikurd Chimen, sans-serif;یونیکورد دیگیتاڵ=Unikurd Digital, sans-serif;یونیکورد دیاکۆ=Unikurd Diyako, sans-serif;یونیکورد ئەزمەڕ=Unikurd Ezmer, sans-serif;یونیکورد گۆران=Unikurd Goran, sans-serif;یونیکورد هانا=Unikurd Hana, sans-serif;یونیکورد هەژار=Unikurd Hejar, sans-serif;یونیکورد هێمن=Unikurd Hemen, sans-serif;یونیکورد هیوا=Unikurd Hiwa, sans-serif;یونیکورد ژینۆ=Unikurd Jino, sans-serif;یونیکورد کاڵێ=Unikurd Kale, sans-serif;یونیکورد کامران=Unikurd Kamran, sans-serif;یونیکورد کاوە=Unikurd Kawe, sans-serif;یونیکورد کۆچ=Unikurd Koch, sans-serif;یونیکورد مەگروون=Unikurd Magroon, sans-serif;یونیکورد مەستان=Unikurd Mestan, sans-serif;یونیکورد میدیا=Unikurd Midya, sans-serif;یونیکورد نالی=Unikurd Nali, sans-serif;یونیکورد ناسکە=Unikurd Naske, sans-serif;یونیکورد پێنوس=Unikurd Sirwan, sans-serif;یونیکورد پەشێو=Unikurd Peshiw, sans-serif;یونیکورد ڕەواندوز=Unikurd Rawanduz, sans-serif;یونیکورد ڕێحان=Unikurd Reyhan, sans-serif;یونیکورد ڕۆناك=Unikurd Roonak, sans-serif;یونیکورد سەیران=Unikurd Seyran, sans-serif;یونیکورد شیلان=Unikurd Shilan, sans-serif;یونیکورد سیبەر=Unikurd Siber, sans-serif;یونیکورد سیروان=Unikurd Sirwan, sans-serif;یونیکورد تەوەر=Unikurd Tewar, sans-serif;یونیکورد تیشك=Unikurd Tishk, sans-serif;یونیکورد خانی=Unikurd Xani, sans-serif;یونیکورد خاتوون=Unikurd Xatoon, sans-serif;یونیکورد خەزال=Unikurd Xezal, sans-serif;یونیکورد یادگار=Unikurd Yadgar, sans-serif;لەتیف=Lateef, sans-serif;نەریزی=Neirizi, sans-serif;کەیهان=XB Kayhan, sans-serif;کەیهان ناڤار=XB Kayhan Navaar, sans-serif;کەیهان سایا=XB Kayhan Sayeh, sans-serif;شەفیق کورد=XB Shafigh Kurd, sans-serif;شیراز=XB Shiraz, sans-serif;تەبریز=XB Tabriz, sans-serif;تیترێ=XB Titre, sans-serif;تیترێ شادۆ=XB Titre Shadow, sans-serif;ڤەهید=XM Vahid, sans-serif;یەکان=XM Yekan, sans-serif;زیبە=XP Ziba, sans-serif;زکورد عەلی=zkurd2, sans-serif;زکورد ئاراس=Unikurd Ezmer, sans-serif;زکورد سیامەند=Unikurd Naske, sans-serif;زکورد وڵات=zkurd2, sans-serif;Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';
	
	/*
	 *	کرداری هێنانی فۆنتەکان لە ڕاژەی وێبچن
	 */
	
	$das['content_css'] = 'http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_7EMZE,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_A7MED,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_ABDULLAH,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_ABO-DHABI,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_AKHBARIA,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_ALI,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_ASKANDAR,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_Arabyeh,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_Aramco,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_Aso,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_Asya,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_BEHMEN,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_BEXUD,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_DARA,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_DIGITAL,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_DWANGE,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_EDEB,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_Ebrahim,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_Efriqa,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_Efsun,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_Hemin,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_JWNEYD,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_KAMARAN,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_KARMEND,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_KARWAN,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_KHAMA,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_Kufi,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_MOBILE_TV,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_MUHAMMAD,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_Meju,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_NAWA,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_OMAR,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_PAYAM,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_PENJWEN,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_POSTER,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_SAMAN,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_SAMi,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_TWANA,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_Taef,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_TeXtE,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_YELDA,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_YUSUF,http://services.webchin.org/web-fonts/web-font?font=UniQAIDAR_ZANA,http://services.webchin.org/web-fonts/web-font?font=amiriregular,http://services.webchin.org/web-fonts/web-font?font=dejavusans,http://services.webchin.org/web-fonts/web-font?font=droidkufiregular,http://services.webchin.org/web-fonts/web-font?font=droidnaskhregular,http://services.webchin.org/web-fonts/web-font?font=kchimen,http://services.webchin.org/web-fonts/web-font?font=kdigital,http://services.webchin.org/web-fonts/web-font?font=kdiyako,http://services.webchin.org/web-fonts/web-font?font=kezmer,http://services.webchin.org/web-fonts/web-font?font=kgoran,http://services.webchin.org/web-fonts/web-font?font=khana,http://services.webchin.org/web-fonts/web-font?font=khejar,http://services.webchin.org/web-fonts/web-font?font=khemen,http://services.webchin.org/web-fonts/web-font?font=khiwa,http://services.webchin.org/web-fonts/web-font?font=kjino,http://services.webchin.org/web-fonts/web-font?font=kkale,http://services.webchin.org/web-fonts/web-font?font=kkamran,http://services.webchin.org/web-fonts/web-font?font=kkawe,http://services.webchin.org/web-fonts/web-font?font=kkoch,http://services.webchin.org/web-fonts/web-font?font=kmagroon,http://services.webchin.org/web-fonts/web-font?font=kmestan,http://services.webchin.org/web-fonts/web-font?font=kmidya,http://services.webchin.org/web-fonts/web-font?font=knali,http://services.webchin.org/web-fonts/web-font?font=knaske,http://services.webchin.org/web-fonts/web-font?font=kpenos,http://services.webchin.org/web-fonts/web-font?font=kpeshew,http://services.webchin.org/web-fonts/web-font?font=krawanduz,http://services.webchin.org/web-fonts/web-font?font=kreyhan,http://services.webchin.org/web-fonts/web-font?font=kroonak,http://services.webchin.org/web-fonts/web-font?font=kseyran,http://services.webchin.org/web-fonts/web-font?font=kshilan,http://services.webchin.org/web-fonts/web-font?font=ksiber,http://services.webchin.org/web-fonts/web-font?font=ksirwan,http://services.webchin.org/web-fonts/web-font?font=ktewar,http://services.webchin.org/web-fonts/web-font?font=ktishk,http://services.webchin.org/web-fonts/web-font?font=kxani,http://services.webchin.org/web-fonts/web-font?font=kxatoon,http://services.webchin.org/web-fonts/web-font?font=kxezal,http://services.webchin.org/web-fonts/web-font?font=kyadgar,http://services.webchin.org/web-fonts/web-font?font=lateefregot,http://services.webchin.org/web-fonts/web-font?font=neirizi,http://services.webchin.org/web-fonts/web-font?font=xbkayhan,http://services.webchin.org/web-fonts/web-font?font=xbkayhannavaar,http://services.webchin.org/web-fonts/web-font?font=xbkayhansayeh,http://services.webchin.org/web-fonts/web-font?font=xbshafighkurd,http://services.webchin.org/web-fonts/web-font?font=xbshiraz,http://services.webchin.org/web-fonts/web-font?font=xbtabriz,http://services.webchin.org/web-fonts/web-font?font=xbtitre,http://services.webchin.org/web-fonts/web-font?font=xbtitreshadow,http://services.webchin.org/web-fonts/web-font?font=xmvahid,http://services.webchin.org/web-fonts/web-font?font=xmyekan,http://services.webchin.org/web-fonts/web-font?font=xpziba,http://services.webchin.org/web-fonts/web-font?font=zkurdali,http://services.webchin.org/web-fonts/web-font?font=zkurdaras,http://services.webchin.org/web-fonts/web-font?font=zkurdsiamend,http://services.webchin.org/web-fonts/web-font?font=zkurdwllat';
	
	return $das;
		
	}
	add_filter('tiny_mce_before_init', 'webchin_kwf_kirdari_dabes');

?>