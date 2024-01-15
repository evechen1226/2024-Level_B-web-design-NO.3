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
        <button>確定</button>
        <button>重置</button>
    </div>
</div>
<script>
    getMovies();

    $("#movie").on("change",function(){
        let id=$("#movie").val();
        getDates()
        // getDates($("#movie").val())
    })

    function getMovies(){
        $.get("./api/get_movies.php",(movies)=>{

            $('#movie').html(movies);
            let test=$('#movie').html(movies)
            let id=$("#movie").val();
            getDates(id) //電影的id
            console.log(test)

        })
    }
    function getDates(id){
        $.get("./api/get_dates.php",{id},(dates)=>{
            $('#date').html(dates);
            let movie=$('#movie').val()
            let date=$('#date').val()
            getSeesions(movie,date)
        })
    }
    function getSeesions(movie,date){
        $.get("./api/get_sessions.php",{movie,date},(sessions)=>{
            $('#sessions').html(sessions);
        })
    }

</script>