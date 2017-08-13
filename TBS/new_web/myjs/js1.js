var img=["images/slider1.jpg","images/slider2.jpg","images/slider4.jpg","images/slider3.jpg"], i=0 ;
function myJS1(){
    
    document.getElementById('demo').src=img[i];
    if(i++===img.length-1){
        i=0;
    }
    
}
var myimg1=setInterval(myJS1, 5000);



