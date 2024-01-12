<style>
    .form td:nth-child(1) {
        text-align-last: justify;
        padding: 3px 5px;
    }
</style>
<h2 class="ct">編輯院線片</h2>
<!-- 實務上要檢查$_GET 拿到的資料 -->
<?php $movie = $Movie->find($_GET['id']); ?>
<form action="./api/edit_movie.php" method="post" enctype="multipart/form-data">
    <div style="display:flex;align-items:start;">
        <div style="width:15%;">影片資料</div>
        <div style="width:85%;">
            <input type="hidden" name="id" value="" <?= $movie['name']; ?>">
            <table class="ts">
                <tr>
                    <td class="ct">片名:</td>
                    <td class="ct"></td>
                    <td><input type="text" name="name" id="" value="<?= $movie['name']; ?>"></td>
                </tr>
                <tr>
                    <td class="ct">分級:</td>
                    <td class="ct"></td>
                    <td><input type="text" name="" id=""></td>
                </tr>
                <tr>
                    <td class="ct">片長:</td>
                    <td class="ct"></td>
                    <td><input type="text" name="length" id=""></td>
                </tr>
                <tr>
                    <?php
                    //2024-01-11
                    //$ondate=explod("-",$movie['ondate']);
                    [$year, $monte, $date] = explode("-", $movie['ondate']);
                    ?>

                    <td class="ct">上晚日期</td>
                    <td class="ct"></td>
                    <select name="year" id="">
                        <option value="2024"><?= ($yesr == 2024) ? 'selected' : ''; ?></option>
                        <option value="2025">2024</option>
                    </select>年
                    <select name="month" id="">
                        <?php

                        ?>

                    </select>月
                    <select name="date" id=""></select>日
                </tr>
                <tr>
                    <td class="ct">發行商</td>
                    <td class="ct"></td>
                    <td><input type="text" name="" id=""></td>
                </tr>
                <tr>
                    <td class="ct">導演</td>
                    <td class="ct"></td>
                    <td><input type="text" name="" id=""></td>
                </tr>
                <tr>
                    <td class="ct">預告影片</td>
                    <td class="ct"></td>
                    <td><input type="file" name="" id=""></td>
                </tr>
                <tr>
                    <td class="ct">電影海報</td>
                    <td class="ct"></td>
                    <td><input type="file" name="" id=""></td>
                </tr>
            </table>

        </div>
    </div>
    <div style="display:flex;align-items:start;">
        <div style="width:15%;">影片資料</div>
        <div style="width:85%;"><textarea name="intro" id="" cols="30" rows="10"></textarea></div>
        <div class="ct">
            <input type="submit" value="">
            <input type="reset" value="">
        </div>
</form>