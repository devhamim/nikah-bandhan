<style>
/** {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial;
    font-size: 17px;
}
*/

.wrapper-video
{
  position: absolute;
  width: 100%;
  margin-top: -85px;
  
}

#myVideo {
    /*position: fixed;*/
    right: 0;
    bottom: 0;
    width: 100%; 
    height: 100%;
    
}

.content-video {
    /*position: fixed;*/
    bottom: 0;
    /*background: rgba(0, 0, 0, 0.01);*/
    color: #f1f1f1;
    width: 100%;
    padding: 20px;
    position: relative;

}

#myBtn {
    width: 200px;
    font-size: 18px;
    padding: 10px;
    border: none;
    background: rgba(0,0,0,.4);
    color: #fff;
    cursor: pointer;
}

#myBtn:hover {
    background: rgba(255,255,255,.5);
    color: black;
}
</style>

 
<div class="wrapper-video">
  <video autoplay muted loop id="myVideo">
  <source src="{{asset('video/marriage.mp4')}}" type="video/mp4">
  Your browser does not support HTML5 video.
</video>
 
{{-- <div class="content-video">
  <h1>Heading</h1>
  <p>Lorem ipsum dolor sit amet, an his etiam torquatos. Tollit soleat phaedrum te duo, eum cu recteque expetendis neglegentur. Cu mentitum maiestatis persequeris pro, pri ponderum tractatos ei. Id qui nemore latine molestiae, ad mutat oblique delicatissimi pro.</p>
  
</div> --}}
</div>


<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>



 

<style>
.outside {
    position: relative;
    width: 100%;
    height: 675px;
    background-color: rgba(0,0,0,.01); /*to make it visible*/
}
.inside {
    position: absolute;
    bottom: 250px;
    left:10%;
    color: #fff;
}
</style>
<div class="outside">
    <div class="inside">

      <div class="row">
        <div class="col-sm-10">

          <div class="panel " style="background: rgba(0,0,0,.1);">
        <div class="panel-body" style="background: rgba(0,0,0,.1);">





          

{{--  

          <h1>{{config('app.name')}}</h1> 

          <p>Video Description Herer</p>
        
 
  --}}
 
  

  {{-- <button id="myBtn" onclick="myFunction()">Pause</button> --}}
          
        </div>
      </div>
          
        </div>
      </div>

      
      
      
    </div>
</div>


