var img=["images/slide1.jpg", "images/slide2.jpg","images/slide.jpg"], i=0 ;
function myJS1(){
    
    document.getElementById('demo').src=img[i];
    if(i++===img.length-1){
        i=0;
    }
    
}
var myimg1=setInterval(myJS1, 5000);



