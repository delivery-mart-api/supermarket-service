<!-- header -->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

  <?= $this->include('layout/navbar'); ?>
  <?= $this->renderSection('content'); ?>

  <!-- footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    function previewImg() {
      
      // const kategori = document.querySelector();
      //   if($kategori == 'Minuman') {
      //       $namaGambar = 'beverages.png';
      //   } else if ($kategori == 'Daging') {
      //       $namaGambar = 'meat.png';
      //   } else if ($kategori == 'Sayuran') {
      //       $namaGambar = 'vegetable.png';
      //   } else if ($kategori == 'Buah') {
      //       $namaGambar = 'fruits.png';
      //   } else {
      //       $namaGambar = 'toiletries.png';
      //   }
      const imgPreview = document.querySelector('.img-preview');
  
      fileGambar.onload = function (e) {
        imgPreview.src = e.target.result;
      }
  }

  </script>
</body>

</html>