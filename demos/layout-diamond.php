<?php include 'include/head.php'; ?>
<body>
<div class="page">
  <div class="container">

    <div class="topic">
      <h2 class="main-heading"><span>layout: </span>diamond</h2>
      <div class="example-diamond">
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/1.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/2.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/3.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/4.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/5.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/6.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/7.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/8.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/9.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/10.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/11.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/12.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/1.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/2.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/3.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/4.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/5.jpg" alt=""></span></div></div>
        <div class="diamond"><div class="diamond-content" data-content><span><img src="images/diamond/6.jpg" alt=""></span></div></div>
      </div>
      <pre><code class="language-scss">
.diamond { @include diamond(5 'combined'); }
      </code></pre>
      <div class="example-diamond">
        <div class="diamond-s s1"><div class="diamond-content" data-content><span><img src="images/diamond/1.jpg" alt=""></span></div></div>
        <div class="diamond-s s2"><div class="diamond-content" data-content><span><img src="images/diamond/2.jpg" alt=""></span></div></div>
        <div class="diamond-m b1"><div class="diamond-content" data-content><span><img src="images/diamond/3.jpg" alt=""></span></div></div>
        <div class="diamond-m b2"><div class="diamond-content" data-content><span><img src="images/diamond/5.jpg" alt=""></span></div></div>
        <div class="diamond-s s3"><div class="diamond-content" data-content><span><img src="images/diamond/4.jpg" alt=""></span></div></div>
        <div class="diamond-s s4"><div class="diamond-content" data-content><span><img src="images/diamond/6.jpg" alt=""></span></div></div>
        <div class="diamond-s s5"><div class="diamond-content" data-content><span><img src="images/diamond/7.jpg" alt=""></span></div></div>
        <div class="diamond-s s6"><div class="diamond-content" data-content><span><img src="images/diamond/8.jpg" alt=""></span></div></div>
        <div class="diamond-m b3"><div class="diamond-content" data-content><span><img src="images/diamond/9.jpg" alt=""></span></div></div>
      </div>
      <pre><code class="language-scss">
.diamond-s { @include diamond(20%); }
.diamond-m { @include diamond(60%); }      
.s1 { 
  margin-top: 30%; 
  position: relative;
  left: 10%;
}
.s2 { margin-top: 20%; }
.b2 {
  margin-top: -30%;
  margin-left: 10%;
}
.s3 {
  margin-top: -20%;
  margin-left: 10%;
}
.s4 { margin-top: -10%; }
.s5 {
  margin-left: 20%;
  margin-top: -10%;
}
.s6 { margin-left: -30%; }
.b3 {
  margin-top: -40%;
  margin-left: 40%;
}
      </code></pre>
    </div>
 
    <?php include "include/more-demos.php" ?>
  </div>
  <?php include "include/site-footer.php" ?>
</div>
</body>
</html>

