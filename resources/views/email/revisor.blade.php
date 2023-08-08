<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRESTO.COM</title>
    
    {{-- GOOGLE FONTS --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600&family=Satisfy&display=swap" rel="stylesheet">
    
    {{-- INIZIO CSS --}}
    <style>
        body{
            background-color: #60BBE5;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        *{
            font-family: 'Montserrat', sans-serif;
        }
        
        h1{
            font-family: 'Satisfy', cursive;
            color: rgb(255, 200, 0);
        }
        
        .text-center{
            text-align: center;
            color: white;
        }
        
        .card-custom{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            text-align: center;
            width: 380px;
            height: 350px;
            background-color: #313268;
            color: white;
            box-shadow: 3px 3px 3px gray;
        }
        
        .btn-custom{           
            width: 150px;
            height: 40px;
            background-color: rgb(255, 200, 0);
            border: none;
            border-radius: 5px;
        }
        
        .ancor-custom{
            text-decoration: none;
            color: white;
        }
    </style>
    
</head>
<body>
    
    {{-- INIZIO SEZIONE HEADER --}}
    <header class="text-center">
        <h1>CIAO ADMIN</h1>
        <h3>UN UTENTE HA FATTO RICHIESTA PER DIVENTARE REVISORE DI PRESTO.IT!</h3>
        <h4>ECCO I DATI DELL'UTENTE.</h4>
    </header>
    
    {{-- INIZIO MAIN --}}
    <main class="card-custom">
        
        {{-- INIZIO SECTION CON INFORMAZIONI DEL CLIENTE --}}
        <section>
            <p>NOME UTENTE:</p>
            <p>{{$user->name}}</p>
            <p>EMAIL:</p>
            <p>{{$user->email}}</p>
            <p>PRESENTAZIONE:</p>
            <p>{{$description}}</p>
            <p>Clicca qui per renderlo revisore del sito!</p>
            <button class="btn-custom">
                <a class="ancor-custom" href="{{route('makeRevisor', compact('user'))}}">RENDI REVISORE</a>
            </button>
        </section>
        {{-- FINE SECTION CON INFORMAZIONI DEL CLIENTE --}}
    </main>
    {{-- FINE MAIN --}}
    {{-- <div>
        <h1>
            {{$user->name}} con la mail {{$user->email}} ci ha contattato per lavorare con noi. 
        </h1>
    </div>
    <div>
        <p>Clicca sotto per renderlo revisore</p>
        <a href="{{route('makeRevisor', compact('user'))}}">rendi revisore</a>
        
    </div> --}}
</body>
</html>