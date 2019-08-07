<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Autoin.com - 견적 제출하기</title>

    <!-- Bootstrap core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css?ver=1" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css?ver=1">

    <!-- Custom styles for this template -->
    <link href="./css/shop-item.css?ver=1" rel="stylesheet">

</head>
<body>
  <!-- Navigation -->




  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">Requset For Quotes</h1>
        <div class="list-group">
          <a href="./index_OEM.html" class="list-group-item">RFQ List</a>
          <a href="./Request.html" class="list-group-item">Requset For Quotation</a>
          <a href="#" class="list-group-item">Contact</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

        <!-- /.card -->



        <div class="col-lg-9">
					<!-- General Unify Forms -->
					<form name="frmRfq" id="frmRfq" enctype="multipart/form-data" action="rfqProc.asp" method="post" class="sky-form">
					<input type="hidden" name="mode" id="mode" value="I">
					<input type="hidden" name="rfqNo" id="rfqNo" value="">


					<hader>1. Photo</hader>
					



						<fieldset>
              <div style="border:1px solid; padding:10px;">
							<section>
								<label class="label">Upload NDA Files</label>
								<label for="file" class="input input-file">
									<div class="button"><input type="file" name="file4Name" id="file4Name" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="NDA Filese" readonly>
								</label>
							</section>
            	</div>
						</fieldset>


						<header>2. Certificated</header>

						<fieldset>
              <div style="border:1px solid; padding:10px;">
							<section>
								<!--<label class="label">Certificated</label>-->
								<div class="row">
									<div class="col col-4">
										<label class="checkbox"><input type="checkbox" name="certificated" value="No"><i></i>No</label>
										<label class="checkbox"><input type="checkbox" name="certificated" value="ISO 14001"><i></i>ISO 14001</label>
									</div>
									<div class="col col-4">
										<label class="checkbox"><input type="checkbox" name="certificated" value="ISO/TS 16949"><i></i>ISO/TS 16949</label>
										<label class="checkbox"><input type="checkbox" name="certificated" value="ISO 26262"><i></i>ISO 26262</label>
									</div>
									<div class="col col-4">
										<label class="checkbox"><input type="checkbox" name="certificated" value="ISO 9001"><i></i>ISO 9001</label>
									</div>
								</div>
							</section>
            </div>
						</fieldset>

						<header>3. Describe Your Part & Upload Your Files</header>

						<fieldset>
              <div style="border:1px solid; padding:10px;">
							<section>
								<label class="label">Part Name</label>
								<label class="input">
									<input type="text" name="partName" id="partName" placeholder="Bushing, Engine Mount" value="">
								</label>
							</section>

							<section>
								<label class="label">Description</label>
								<label class="textarea">
									<textarea name="description" id="description" rows="6"></textarea>
								</label>
							</section>

							<section>
								<label class="label">Due Date</label>
								<label class="input">
									<i class="icon-append fa fa-calendar"></i>
									<input type="text" name="dueDate" id="date" placeholder="Quotes Needed By" value="">
								</label>
							</section>

            </div>
						</fieldset>



						<footer class="text-center">
							<button type="button" class="btn-u btn-u-default btn-u-lg" onclick="window.history.back();">Back</button>
							<button type="submit" class="btn-u btn-u-lg">Submit RFQ</button>
						</footer>

					</form>
					<!-- General Unify Forms -->
				</div>
				<!-- End Content -->
  </div>
  <!-- /.container -->
</div>

</body>
</html>
