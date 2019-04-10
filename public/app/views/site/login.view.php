<?php
/**
 * User: TOLK  Date: 07.04.19
*/
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Вход</div>

                <div class="card-body">
                    <form method="POST" action="/site/login">

                        <div class="form-group row">
                            <label for="user" class="col-sm-4 col-form-label text-md-right">Пользователь</label>

                            <div class="col-md-6">
                                <input id="user" type="text" class="form-control" name="user"
                                       value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Вход
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

