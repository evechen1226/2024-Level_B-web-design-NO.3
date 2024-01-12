<style>
    .form td:nth-child(1) {
        text-align-last: justify;
        padding: 3px 5px;
    }
</style>
<form action="./api/save_movie.php" method="post" enctype="multipart/form-data">
    <div style="display:flex;align-items:start;">
        <div style="width:15%;">影片資料</div>
        <div style="width:85%;">

            <table class="ts">
                <tr>
                    <td class="ct">片名:</td>
                    <td><input type="text" name="name" id=""></td>
                </tr>
                <tr>
                    <td class="ct">分級:</td>
                    <td>
                        <select name="level" id="">
                            <option value="1">普遍級</option>
                            <option value="2">輔導級</option>
                            <option value="3">保護級</option>
                            <option value="4">限制級</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="ct">片長:</td>
                    <td><input type="text" name="length" id=""></td>
                </tr>
                <tr>
                    <td class="ct">上晚日期</td>
                    <select name="year" id="">
                        <option value="2024">2024</option>
                        <option value="2025">2024</option>
                    </select>年
                    <select name="month" id="">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value='$";
                        }
                        ?>

                    </select>月
                    <select name="date" id=""></select>日
                </tr>
                <tr>
                    <td class="ct">發行商</td>
                    <td><input type="text" name="" id=""></td>
                </tr>
                <tr>
                    <td class="ct">導演</td>
                    <td><input type="text" name="" id=""></td>
                </tr>
                <tr>
                    <td class="ct">預告影片</td>
                    <td><input type="file" name="" id=""></td>
                </tr>
                <tr>
                    <td class="ct">電影海報</td>
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