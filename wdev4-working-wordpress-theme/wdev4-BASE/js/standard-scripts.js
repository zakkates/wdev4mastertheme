/* Set a Max-Width and Max-Height to ALL Images on page */
function maxImageWidthSizing() {
$('img').each(function() { 
// Create new offscreen image to test
var theImage = new Image();
theImage.src = $(this).attr("src");
// Get accurate measurements from that.
var imageWidth = theImage.width; var imageHeight = theImage.height;
//console.log("image width pre css: " + $(this).width() + " | image max width set: " + imageWidth);
$(this).css({"max-width": imageWidth + "px", "max-height": imageHeight + "px"});
});  
// Run the removeWidthFromCaptions()
imagesLoaded('img:last-child',removeWidthFromCaptions);  
} 
// Run the Max-Width and Max-Height Function
//imagesLoaded('img:last-child',maxImageWidthSizing);
$(window).load(maxImageWidthSizing);

/* remove width from captions */
function removeWidthFromCaptions() {
    $('div.wp-caption').each(function() {
        $(this).removeAttr('style');
        //set max-width of the caption to the max-width of image it contains
         var imgMaxWidth = $(this).find('img').css('max-width');
        $(this).css('max-width',imgMaxWidth);
        // set width of caption if the img isn't a size
        if ( ($(this).find('img').hasClass('size-full') !== true) && ($(this).find('img').hasClass('size-medium') !== true) && ($(this).find('img').hasClass('size-thumbnail') !== true) && ($(this).find('img').hasClass('size-large') !== true)) {
            console.log("if statement = does not have a size class");
            var imgWidth = $(this).find('img').attr('width');  
            $(this).css('width',imgWidth);
        } else {
           console.log("if statement = Has a Size Class"); 
        }
    });
    }
// Run the removeWidthFromCaptions() function ran after max-width runs

//Making responsive images adjustable and still responsive
$('img.size-wdev4-responsive-images').each(function(){
if ($(this).parent().width() != 0) {
console.log($(this).parent().width());
var responsiveWidth = $(this).width() / $(this).parent().width() * 100;
$(this).css('width', responsiveWidth + '%');
console.log(responsiveWidth);
} else {
console.log($(this).parent().parent().width());
var responsiveWidth = $(this).width() / $(this).parent().parent().width() * 100;
$(this).css('width', responsiveWidth + '%');
console.log(responsiveWidth);
}

});


/* Lightbox for Native Wordpress Galleries */
function lightboxNativeGalleries() {
$('div.gallery').each(function(){
    var galleryID = $(this).attr('id');
    $(this).find('dl').each(function(){
    var galleryImgSrc = $(this).find('img').attr('src');
    if (galleryImgSrc.indexOf('jpg') != -1) {
        galleryImgSrc = galleryImgSrc.slice(0,-12);
        galleryImgSrc = galleryImgSrc + ".jpg";
    }
    else if (galleryImgSrc.indexOf('png') != -1) {
        galleryImgSrc = galleryImgSrc.slice(0,-12);
        galleryImgSrc = galleryImgSrc + ".png";
    }
    else if (galleryImgSrc.indexOf('gif') != -1) {
        galleryImgSrc = galleryImgSrc.slice(0,-12);
        galleryImgSrc = galleryImgSrc + ".gif";
    }
    else if (galleryImgSrc.indexOf('jpeg') != -1) {
        galleryImgSrc = galleryImgSrc.slice(0,-13);
        galleryImgSrc = galleryImgSrc + ".jpeg";
    }
    //console.log(galleryImgSrc);
    $(this).find('a').attr('href', galleryImgSrc);
    $(this).find('a').attr('class', "fancybox");
    $(this).find('a').attr('data-fancybox-group', galleryID);
    var galleryImgTitle = $(this).find('.wp-caption-text').html();
    $(this).find('a').attr('title', galleryImgTitle);
    })
})    
}
$(document).ready(function() {
    lightboxNativeGalleries();
});


/*Responsive Videos */
$(document).ready(function() {
  $('iframe').each(function(){
      var iframesource = $(this).attr('src'); 
      var vimeo = new RegExp("vimeo");
      var youtube = new RegExp("youtube");
      if (vimeo.test(iframesource) || youtube.test(iframesource)){
         //console.log('contains video');
      $(this).wrap('<div class="video-container"></div>');
      } else {
          //console.log('does not contain video');
      }
});
});

// Search through items for the largest of that item, then assign that largest height to all items of this kind
   function assign_largest_height_to_all(targeted_element) {
       var myArray = []; 
    $(targeted_element).each(function() { 
    myArray.push($(this).height())}); 
    Math.max(myArray); 
    var maxValueInArray = Math.max.apply(Math, myArray); 
    console.log(targeted_element + "'s largest height: " + maxValueInArray); 
    $(targeted_element).each(function() { 
        $(this).height(maxValueInArray)});
   }
        
/*  - - - --  - - - - - - - - - - - - - - - - - - - -- -  - - - - - - - -- - - - */        
/* SET TO BE DEPRCIATED */
/*  - - - --  - - - - - - - - - - - - - - - - - - - -- -  - - - - - - - -- - - - */   
/* BEEN REPLACED BY FANCY BOX --- Pop Up light box for Videos rel="wp-video-lightbox" This function calls the video pop up. This is 1 of 3 files that make this works. 2 is CSS and 3 is the Video.js*/
/* <![CDATA[ */
var vlpp_vars = {"prettyPhoto_rel":"wp-video-lightbox","animation_speed":"fast","slideshow":"5000","autoplay_slideshow":"false","opacity":"0.80","show_title":"false","allow_resize":"true","allow_expand":"true","default_width":"80%","default_height":"90%","counter_separator_label":"\/","theme":"pp_default","horizontal_padding":"20","hideflash":"false","wmode":"opaque","autoplay":"false","modal":"false","deeplinking":"false","overlay_gallery":"true","overlay_gallery_max":"30","keyboard_shortcuts":"true","ie6_fallback":"true"};
/* ]]> */