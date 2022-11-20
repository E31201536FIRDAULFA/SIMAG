
    $('#absen').click(() => {
        $.post(
            '/Peserta/addAbsen',
            (data) => {
                console.log(data)
            }
        )
    })

    function isbeetweentwotime(startTime, endTime) {
        var d = new Date();
        var n = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
        if (n >= startTime && n <= endTime) {
            return true;
        } else {
            return false;
        }
    }

    dataAbsen = {}
    setInterval(() => {
        $.get(
            '/Peserta/getAbsen' , 
            (data) => {
                if(data){
                    if(JSON.stringify(data) == JSON.stringify(globalThis.dataAbsen)){
                        return;
                    }else{
                        globalThis.dataAbsen = data
                        $('#start-time').html(data['datang'])
                        $('#end-time').html(data['pulang'])        
                    }
                }else{
                        $('#start-time').html(data['datang'])
                        $('#end-time').html(data['pulang'])
                        $('#message').html('Anda sudah absen')
                }
            }
        )
    }, 1000);