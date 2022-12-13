let  weatherDes = document.getElementById('weather-des'),
     weatherTem = document.getElementById('weather-tem'),
     weatherIcon = document.getElementById('weather-icon');



    window.addEventListener('load',()=>{
        let lon
        let lat
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition( posicion => {
                // console.log(posicion)
                lon=posicion.coords.longitude
                lat=posicion.coords.latitude

                const url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=82305d963828305b5dd96be8003ff2b2&lang=es`
                // console.log(url)
                
                fetch(url)
                    .then(response => {return response.json()})
                    .then(data => {
                            console.log(data)
                        let temp = Math.round(data.main.temp - 273.15)
                        weatherTem.textContent= `${temp} °C `
                        let desc= data.weather[0].description
                        weatherDes.textContent = desc.toUpperCase()

                        switch (data.weather[0].main) {
                            case 'Thunderstorm':
                              weatherIcon.src='../img/animated/thunder.svg'
                              break;
                            case 'Drizzle':
                              weatherIcon.src='../img/animated/rainy-2.svg'
                              break;
                            case 'Rain':
                              weatherIcon.src='../img/animated/rainy-7.svg'
                              break;
                            case 'Snow':
                              weatherIcon.src='../img/animated/snowy-6.svg'
                              break;                        
                            case 'Clear':
                                weatherIcon.src='../img/animated/day.svg'
                              break;
                            case 'Atmosphere':
                              weatherIcon.src='../img/animated/weather.svg'
                                break;  
                            case 'Clouds':
                                weatherIcon.src='../img/animated/cloudy-day-1.svg'
                                break;  
                            default:
                              weatherIcon.src='../img/animated/cloudy-day-1.svg'
                          }

                    })
                    .catch( error =>{
                         console.log(error)
                    })
            })
            
        }
    })