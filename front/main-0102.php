<style>
    .lists {
        /* position: relative; */
        left: 114px;
    }

    .item * {
        box-sizing: border-box;
    }

    .item {
        box-sizing: border-box;
        width: 200px;
        height: 240px;
        margin: auto;
        position: absolute;
        display: none;
    }

    .item div img {
        width: 100%;
        height: 220px;
    }

    .item div {
        text-align: center;
    }

    /* 下方箭頭用CSS繪製 */
    .left,
    .right {
        width: 0;
        border: 20px solid black;
        border-top-color: transparent;
        border-bottom-color: transparent;
    }

    .left {
        border-left-width: 0;
    }

    .right {
        border-left-width: 0;
    }

    .btns {
        width: 360px;
        height: 100px;
        display: flex;
        overflow: hidden;
    }

    .btn img {
        width: 60px;
        height: 80px;
    }

    .btn {
        font-size: 12px;
        text-align: center;
        flex-shrink: 0;
        width: 90px;
    }

    .controls {
        width: 420px;
        height: 100px;
        position: relative;
        margin-top: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="lists">
            <?php
            $posters = $Poster->all(['sh' => 1], " order by rank");
            foreach ($posters as $poster) {
            ?>
                <div class="item">
                    <div class="poster"><img src="./img/<?= $poster['img'] ?>" alt=""></div>
                    <div><?= $poster['name'] ?></div>
                </div>

            <?php
            }
            ?>
        </div>
        <div class="controls">
            <div class="left"></div>
            <div class="btns"></div>
        </div>
    </div>
</div>
</div>
<script>
    // .eq() 位置
    $(".item").eq(0).show();
    // $(".btn").lengthi計算有幾個.btn
    let total = $(".btn").length
    // 類似分頁功能
    // 參考題組一 校園映像檔
    let p = 0
    $(".left,.right").on("click", function() {
        // 原本就有的屬性，可以直接利用
        let arrow = $(this).attr('class')

        switch (arrow) {
            case "right":
                if (p + 1 <= (total - 4)) {
                    p = p + 1
                }
                break;
            case "left":
                if (p - 1 >= 0) {
                    p = p - 1
                }
                break;
        }
        $(".btn").animate({
            right: 90 * p
        })
    })
</script>
<style>
    .movies {
        display: flex;
        flex-wrap: wrap;
    }

    .movie {
        display: flex;
        flex-wrap: wrap;
        box-sizing: border-box;
        padding: 2px;
        margin: 0.5%;
        border: 1px solid white;
        width: 49%;
        /* ↓用來美化，考試可不打 */
        border-radius: 5px;
    }
</style>
<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <div class="movies">
            <?php
            $today = date("Y-m-d");
            $ondate = date("Y-m-d", strtotime("-2 days"));
            $total = $Movie->count(" where `ondate` > ='$ondate' && `ondate` < ='$today' && `sh`=1 ");
            $div = 4;
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;

            $movies = $Movie->all(" where `ondate`>='$ondate' && `ondate`<='$today' && `sh`=1 order by rank limit $start,$dive");
            ?>
            <div class="movie">
                <div>
                    <a href="?do=intro&id=<?= $movie['id']; ?>">
                        <img src="./img/<?= $movie['poster']; ?>" alt="" style="width:60px;border:3px solid white;">
                    </a>
                </div>
                <div style="width:65%">
                    <div><?= $movie['name']; ?></div>
                    <div style="font-size:13px;">
                        分級:<img src="./icon/03C0<?= $movie['level'] ?>.png" style="width:20%">
                    </div>

                    <div style="font-size:13px;">上映日期:<?= $movie['ondate'] ?></div>
                </div>
                <div style="width:100%">
                    <button onclick="location.href='?do=intro$id=<?= $movie['id']; ?>'">劇情介紹</button>
                    <button onclick="location.href='?do=order$id=<?= $movie['id']; ?>'">線上訂票</button>

                </div>
            </div>
            <?php
            ?>
        </div>
        <div class="ct">
            <?php
            if ($now - 1 > 0) {
                $prev = $now - 1;
                echo "<a href='?p=$prev> < </a>";
            }

            for ($i = 1; $i <= $pages; $i++) {
                echo "<a href='?p=$i'> $i </a>";
            }

            if ($now + 1 <= $pages) {
                $next = $now + 1;
                echo "<a href='?p=$next> > </a>";
            }

            ?>

        </div>
    </div>
</div>