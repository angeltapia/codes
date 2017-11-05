<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <title>Login Example - Semantic</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="jquery.aCollapTable.js"></script>

  <style type="text/css">
    body {
      background-color: #fff;
    }

    .act-collapsed, .act-expanded{
      font-size: 16px !important;
      color: #000 !important;
      text-decoration: none !important;
      font-weight: bold !important;
    }
   
  </style>
  <script>
  $(document)
    .ready(function() {

  $('.collaptable').aCollapTable({ 

// the table is collapased at start
startCollapsed: true,

// the plus/minus button will be added like a column
addColumn: false, 

// The expand button ("plus" +)
plusButton: '<span class="i">+ </span>', 

// The collapse button ("minus" -)
minusButton: '<span class="i">- </span>' 
  
});

    $('.collaptable2').aCollapTable({ 
    startCollapsed: false,
    addColumn: false, 
    plusButton: '<span class="i">+</span>', 
    minusButton: '<span class="i">-</span>' 
  });

    });
  ;



</script>
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="container" style="margin-top:20px;">
    <h2 class="ui teal image header">
     <!-- <img src="assets/images/logo.png" class="image"> -->
      <div class="content">
        Dev
      </div>
    </h2>
    
  <div class="well">
          <a href="javascript:void(0);" class="btn btn-primary act-button-expand">+ Expand</a>
          <a href="javascript:void(0);" class="btn btn-primary act-button-collapse">- Collapse</a>
          <a href="javascript:void(0);" class="btn btn-primary act-button-expand-all ">+ Expand All</a>
          <a href="javascript:void(0);" class="btn btn-primary act-button-collapse-all">- Collapse All</a>
        </div>
  <table class="collaptable table table-striped">
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>Description</th>
  </tr>
  <tr data-id="z1" data-parent="">
    <td>1</td>
    <td>Element 1</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="z2" data-parent="z1">
    <td>1.1</td>
    <td>Element 2</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="z3" data-parent="z1">
    <td>1.2</td>
    <td>Element 3</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="z6" data-parent="z3">
    <td>1.2.1</td>
    <td>Element 6</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="z7" data-parent="z3">
    <td>1.2.2</td>
    <td>Element 7</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="z8" data-parent="z3">
    <td>1.2.3</td>
    <td>Element 8</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
<?php

  for($j=11; $j<=20;$j++){
    ?>

  <tr data-id="zz<?=$j?>" data-parent="z3">
    <td>2.1</td>
    <td>Element 5</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>

    <?php


  }



  ?>
  <tr data-id="z4" data-parent="">
    <td>2</td>
    <td>Element 4</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="z5" data-parent="z4">
    <td>2.1</td>
    <td>Element 5</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="z9" data-parent="">
    <td>2</td>
    <td>Element 4</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="z10" data-parent="z9">
    <td>2.1</td>
    <td>Element 5</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>

  <?php

  for($i=11; $i<=50;$i++){
    ?>

  <tr data-id="z<?=$i?>" data-parent="z9">
    <td>2.1</td>
    <td>Element 5</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>

    <?php


  }



  ?>

</table>


<div class="well">
          
          <a href="javascript:void(0);" class="btn btn-primary act-button-expand-all2">+ Expand All</a>
          <a href="javascript:void(0);" class="btn btn-primary act-button-collapse-all2">- Collapse All</a>
        </div>
 <table class="collaptable2 table table-striped">
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>Description</th>
  </tr>
  <tr data-id="x1" data-parent="">
    <td>1</td>
    <td>Element 1</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="x2" data-parent="x1">
    <td>1.1</td>
    <td>Element 2</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="x3" data-parent="x1">
    <td>1.2</td>
    <td>Element 3</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="x6" data-parent="x3">
    <td>1.2.1</td>
    <td>Element 6</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="x7" data-parent="x3">
    <td>1.2.2</td>
    <td>Element 7</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="x8" data-parent="x3">
    <td>1.2.3</td>
    <td>Element 8</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="x4" data-parent="">
    <td>2</td>
    <td>Element 4</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
  <tr data-id="x5" data-parent="x4">
    <td>2.1</td>
    <td>Element 5</td>
    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</td>
  </tr>
</table>


  </div>
</div>

</body>

</html>
