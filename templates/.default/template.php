<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
  die();
}
$this->addExternalCss("/bitrix/css/main/bootstrap_v4/bootstrap.css");
$this->addExternalJS("/bitrix/js/ui/bootstrap4/js/bootstrap.min.js");
$dir = $this->GetFolder();
?>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-6">
            <div class="form-group">
                <form id="commentForm"  action="">
                    <label for="exampleInputEmail1">IP address</label>
                    <div class="row">
                        <div class="col-9">
                            <input class="form-control" id="testip" type="text" required pattern="^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$"  value="<? $dir;?>" name=""  />
                        </div>
                        <div class="col-3">
                            <button id="sub" class="btn btn-primary" >Отправить</button>
                        </div>
                    </div>
                    <div id="emailHelp" class="form-text text-muted">Введите Ваш IP-адрес.</div>
                </form>
            </div>
			<div class="" id="collapseExample">
			  <div class="card card-body res" id="result">
			  </div>
			</div>
        </div>
        <div class="col"></div>
    </div>
</div>
<script>var urlDir = '<?=$dir?>'; </script>
