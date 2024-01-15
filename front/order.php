<div id="select">
    <h3 class="ct">線上訂票</h3>
    <div class="odrder">
        <div>
            <label for="">電影:</label>
            <select name="movie" id="movie">

            </select>
        </div>
        <div>
            <label for="">日期:</label>
            <select name="date" id="date">

            </select>
        </div>
        <div>
            <label for="">場次</label>
            <select name="session" id="session">

            </select>
        </div>
        <div>
        </div>
        <button onclick="$('#select').hide();$('#booking').show()">確定</button>
        <button>重置</button>
    </div>
</div>
<style>
    #room {
        background-image: url('./icon/03D04.png');
        background-position: center;
        background-repeat: none;
        width: 540px;
        height: 370px;
        margin: auto;
    }
</style>

<div id="booking" style='display:none'>
    <div id="room"></div>
    <div id="info">
        <button onclick="$('#select').show();$('#booking').hide()">上一步</button>
        <button>訂購</button>

    </div>
</div>



<script>
    let url = new URL(window.location.href) //可以取到網址內的值或tag的值

    getMovies();

    // 修改movie，連動date
    $("#movie").on("change", function() {
        let id = $("#movie").val();
        getDates()
        // getDates($("#movie").val())
    })
    // 修改date，連動sessions
    $("#date").on('change', function() {
        getSessions($("#movie").val().$("#date").val())
    })

    function getMovies() {
        $.get("./api/get_movies.php", (movies) => {

            $('#movie').html(movies);
            // let id = $("#movie").val();
            // getDates(id) //電影的id
            if (url.searchParams.has('id')) {
                $(`#movie option[value='${url.searchParams.get(id)}']`).prop('selected', true)
            }
            getDates($("#movie").val())
        })
    }

    function getDates(id) {
        $.get("./api/get_dates.php", {
            id
        }, (dates) => {
            $('#date').html(dates);
            let movie = $('#movie').val()
            let date = $('#date').val()
            getSeesions(movie, date)
        })
    }

    function getSeesions(movie, date) {
        $.get("./api/get_sessions.php", {
            movie,
            date
        }, (sessions) => {
            $('#sessions').html(sessions);
        })
    }
</script>