$(window).on('scroll', function (event) {
    if(window.scrollY > window.innerHeight+50 ){
    $("#hero-video").fadeOut()
}
else{$("#hero-video").fadeIn()}

})

if(window.scrollY > window.innerHeight+100 ){
    $("#hero-video").fadeOut()
}
else{$("#hero-video").fadeIn()}


$("#moreClick").click(function(){
    if(document.getElementById("more_div").style.display == "none")
        document.getElementById("more_div").style.display = "block"
    else
        document.getElementById("more_div").style.display = "none" 
})


$("#aboutMore").click(function(){
    if(document.getElementById("about-more").style.display == "none")
        document.getElementById("about-more").style.display = "block"
    else
        document.getElementById("about-more").style.display = "none" 
})


$("#aboutPageMore").click(function(){
    if(document.getElementById("about-page-more").style.display == "none")
        document.getElementById("about-page-more").style.display = "block"
    else
        document.getElementById("about-page-more").style.display = "none" 
})


$("#ourStoryMore").click(function(){
    if(document.getElementById("our-story-more").style.display == "none")
        document.getElementById("our-story-more").style.display = "block"
    else
        document.getElementById("our-story-more").style.display = "none" 
})

$("#founderPageMore").click(function(){
    if(document.getElementById("founder-page-more").style.display == "none")
        document.getElementById("founder-page-more").style.display = "block"
    else
        document.getElementById("founder-page-more").style.display = "none" 
})



$("#play_bishop_video").click(function(){
    if(document.getElementById("bishop_vid").paused){
        document.getElementById("bishop_vid").style.display = "block"
        document.getElementById("bishop_vid").play()
        document.getElementById("play_bishop_video_icon").style.display = "none"      
    }
    else{
        document.getElementById("bishop_vid").style.display = "block"
        document.getElementById("bishop_vid").pause()
        document.getElementById("play_bishop_video_icon").style.display = "flex"     
    }
    
})


$("#play_jhintu_video").click(function(){
    if(document.getElementById("jhintu_vid").paused){
        document.getElementById("jhintu_vid").style.display = "block"
        document.getElementById("jhintu_vid").play()
        document.getElementById("play_jhintu_video_icon").style.display = "none"      
    }
    else{
        document.getElementById("jhintu_vid").style.display = "block"
        document.getElementById("jhintu_vid").pause()
        document.getElementById("play_jhintu_video_icon").style.display = "flex"     
    }
    
})


$("#newsletter-form").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');
    console.log(form.serialize())
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
          alert(data); // show response from the php script.
        },
        error:function(error)
        {
          console.log(error); 
        }
    });
    
});