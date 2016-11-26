/**
 * Created by omarsabbagh on 11/23/16.
 */
var images = new Array;
images[0] = "url('./images/bg/main.png')";
images[1] = "url('./images/bg/main1.png')";
images[2] = "url('./images/bg/main2.png')";
images[3] = "url('./images/bg/main3.png')";

$("#banner-two").PhotoFlip({
    'interval' : 10000,
    'backgroundSize' : 'cover',
    'repeat' : 'no-repeat',
    'transitionTime' : '0.6s'
}, images);
