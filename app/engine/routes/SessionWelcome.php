<?php
$Page->GetView("header",
    array(
        "PageTitle" => "Добро пожаловать"
    )
);
?>
    <style>
        body {
            background: url("http://placekitten.com/2000/1340");
            background-size: cover;
            background-position: top center;
        }

        .main-block {
            background-color: white;
            padding: 20px;
            -webkit-box-shadow: 0 0 30px 0 rgba(0,0,0,0.3);
            box-shadow: 0 0 30px 0 rgba(0,0,0,0.3);
            margin-top: 100px;
        }

        .main-block h3 {
            padding-top: 0;
            margin-top: 0;
            line-height: auto;
            margin-bottom: 15px;
        }
    </style>
    <div class="container main-blocks">
        <div class="row">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <div class="main-block">
                    <div class="row">
                        <div class="col-xs-12"><h3>Регистрация</h3></div>
                    </div>
                    <div class="row">
                        <form>
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group">
                                    <label for="SignupName">Ваше имя:</label>
                                    <input type="email" maxlength="40" class="form-control" id="SignupName" name="SignupName">
                                </div></div>
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group">
                                    <label for="SignupEmail">Адрес email:</label>
                                    <input type="text" maxlength="70" class="form-control" id="SignupEmail" name="SignupEmail">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
$Page->GetView("footer");