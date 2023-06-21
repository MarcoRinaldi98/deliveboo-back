<?php

return [
    "restaurants" => [
        [
            "id" => 1,
            "name" => "Mc Donald's",
            "vat" => "13596850605",
            "phone" => "3783203666",
            "address" => "633 Randy Rest Apt. 354",
            "image" => "https://www.coolinmilan.it/wp-content/uploads/2022/03/mcdonalds-milano.jpg",
            "description" => "La McDonald's Corporation è una catena di ristoranti di fast food statunitense. Fino al 2018 è stata la maggior catena di fast food al mondo per numero di punti vendita, quando è stata superata da Subway.",
            "type_id" => [2, 8, 12],
            "user_id" => "1"
        ],
        [
            "id" => 2,
            "name" => "Burger King",
            "vat" => "09247660039",
            "phone" => "3201298350",
            "address" => "933 Bernier Valleys",
            "image" => "https://i0.wp.com/www.fruitbookmagazine.it/wp-content/uploads/2021/01/burger-king-rebranding.jpg?fit=1200%2C630&ssl=1",
            "description" => "Burger King Corporation è una celebre catena internazionale di ristorazione fast food. È presente con oltre 200 ristoranti in Australia sotto il nome Hungry Jack's.",
            "type_id" => [2, 8, 12],
            "user_id" => "2"
        ],
        [
            "id" => 3,
            "name" => "KFC",
            "vat" => "91778630201",
            "phone" => "3758446615",
            "address" => "35946 Mandy Crossing Suite 644",
            "image" => "https://media-cdn.tripadvisor.com/media/photo-s/1b/99/44/8e/kfc-faxafeni.jpg",
            "description" => "La Kentucky Fried Chicken (pollo fritto del Kentucky), sigla KFC, è una catena statunitense di fast food specializzata nel pollo fritto, preparato secondo una ricetta tenuta segreta sin dalla sua creazione, che in base a quanto dichiarato dalla società è costituita da 11 erbe e spezie.",
            "type_id" => [2, 8],
            "user_id" => "3"
        ],
        [
            "id" => 4,
            "name" => "Kebhouze",
            "vat" => "85369330502",
            "phone" => "3470089710",
            "address" => "264 Lynch Estate Apt. 352",
            "image" => "https://kebhouze.com/wp-content/uploads/2023/05/kiosk1-1-2048x1365.jpg",
            "description" => "Kebhouze è la prima catena di kebab al mondo amata da grandi e piccini! Da Kebhouze è possibile trovare 4 tipi di kebab diversi per tutti i gusti, compreso il kebab vegetale per vegani e vegetariani, così come bowl a base riso o insalata.",
            "type_id" => [2, 8],
            "user_id" => "4"
        ],
        [
            "id" => 5,
            "name" => "Poke House",
            "vat" => "61757490174",
            "phone" => "3435805607",
            "address" => "7166 Paul Dale Apt. 246",
            "image" => "https://just-eat-prod-eu-res.cloudinary.com/image/upload/c_fill,f_auto,q_auto,w_1200,h_630,d_it:cuisines:poke-2.jpg/v1/it/restaurants/229462.jpg",
            "description" => "Un mix di riso, pesce crudo e verdure di stagione selezionate con cura da fornitori locali, arricchite da salse uniche preparate con ricette segrete. Personalizza al momento la tua poke tra infinite combinazioni di sapori, o scegli dal menù una delle popolarissime House Bowl!",
            "type_id" => [7, 10],
            "user_id" => "5"
        ],
        [
            "id" => 6,
            "name" => "Billy Tacos",
            "vat" => "35244110280",
            "phone" => "3005054904",
            "address" => "402 Moen Ville",
            "image" => "https://www.confimprese.it/wp-content/uploads/2022/10/Billy-Tacos-Maximo.jpg",
            "description" => "Personalizza tacos, burrito e bowl scegliendo tra più di 40 mila combinazioni a partire da 6€. Gusta freschissimi piatti Tex Mex pronti in 5 minuti.",
            "type_id" => [5],
            "user_id" => "6"
        ]
    ],
    "dishes" => [
        [
            "id" => 1,
            "name" => "Big Mac",
            "description" => "Un gustoso panino formato da pane, carne bovina, formaggio, salsa bic mac, insalata, cipolla, cetriolo",
            "price" => 4.99,
            "image" => "https://www.mcdonalds.it/sites/default/files/styles/compressed/public/products/big-mac-hero-dsk.jpg?itok=EzWK4D0K",
            "available" => true,
            "restaurant_id" => 1
        ],
        [
            "id" => 2,
            "name" => "Crispy McWrap",
            "description" => "Una gustosa e croccante tortillas che avvolge carne bovina, formaggio, bacon, insalata e salsa crispy",
            "price" => 6.99,
            "image" => "https://www.mcdonalds.it/sites/default/files/styles/compressed/public/products/mcwrap_lp_hero_desk.jpg?itok=6si0hfV_",
            "available" => true,
            "restaurant_id" => 1
        ],
        [
            "id" => 3,
            "name" => "Bacon King",
            "description" => "Il panino definitivo. La combinazione perfetta di ingredienti. Il gusto sublime del bacon e quello della carne alla griglia, accompagnati da ketchup, maionese e saporito pane al mais: il Bacon King è un panino che non si fa dire di no.",
            "price" => 5.99,
            "image" => "https://www.burgerking.it/site/assets/files/7818470/prodotto_copia_2.png",
            "available" => true,
            "restaurant_id" => 2
        ],
        [
            "id" => 4,
            "name" => "Double Cheeseburger",
            "description" => "È il mix perfetto. Doppia carne per i più affamati. Formaggio fuso e ketchup per dare un gusto molto americano. Il ® Double Cheeseburger ha tutto.",
            "price" => 2.99,
            "image" => "https://cdn.shopify.com/s/files/1/0507/5134/0708/articles/mrdobelina-double-cheese-blog_1200x1200.jpg?v=1611828845",
            "available" => true,
            "restaurant_id" => 2
        ],
        [
            "id" => 5,
            "name" => "Bucket Tender Crispy",
            "description" => "Un Bucket con 10 deliziosi Tender Crispy e due salse a scelta, pensato per 2 persone",
            "price" => 9.99,
            "image" => "https://www.bidibee.com/file/5d97e5af570000f12ef359b7/MARKETS/63bf747e1200000a189cc022/ITEMS/63bf749412000007189cc02d/medium_um4t78XBvajULne.jpg",
            "available" => true,
            "restaurant_id" => 3
        ],
        [
            "id" => 6,
            "name" => "Junior Box Meal",
            "description" => "Gustosissimi come quelli dei “grandi” ma adatti anche ai più piccoli: i Junior Box Meal ti aspettano da KFC con Krunchy o 2 Tender Crispy o Pop Corn Chicken + Patatine o Purè + Sundae Fiordilatte + Acqua.",
            "price" => 12.99,
            "image" => "https://www.parcocorolla.it/gal_image/mid_1600415983_1434_2.jpg",
            "available" => true,
            "restaurant_id" => 3
        ],
        [
            "id" => 7,
            "name" => "Vegan Planted",
            "description" => "Una gustosa piadina vegetariana composta da kebab vegetale, pomodori, cipolla, lattuga, olive, maionese vegana",
            "price" => 8.99,
            "image" => "https://www.italiangourmet.it/media/2022/01/Pulled-Pork-vegano-Planted-800x533.jpg",
            "available" => true,
            "restaurant_id" => 4
        ],
        [
            "id" => 8,
            "name" => "Kebangus",
            "description" => "Gustosa piadina con kebab di Black Angus, lattuga, cetriolini, cheddar e salsa burger",
            "price" => 8.99,
            "image" => "https://assets.eatintime.it/eatintime/img/media/13200-DnC6NBHe.jpg",
            "available" => true,
            "restaurant_id" => 4
        ],
        [
            "id" => 9,
            "name" => "Sunny Salmon",
            "description" => "Poke composta da Riso Bianco, Juicy Salmon, Avocado Hass, Edamame, Cavolo Rosso, Salsa Speciale, Crema di Avocado, Sesamo",
            "price" => 14.99,
            "image" => "https://static.cosaporto.it/media/2020/06/Sunny_salmon_Poke_House_Cosaporto.jpg",
            "available" => true,
            "restaurant_id" => 5
        ],
        [
            "id" => 10,
            "name" => "Whole Earth 33 c",
            "description" => "Bevanda Gassata ai Fiori di Sambuco Bio",
            "price" => 2.49,
            "image" => "https://static.cosaporto.it/media/2020/06/Sunny_salmon_Poke_House_Cosaporto.jpg",
            "available" => true,
            "restaurant_id" => 5
        ],
        [
            "id" => 11,
            "name" => "Burrito",
            "description" => "Il burrito è una pietanza che appartiene alla cucina tex-mex e consiste in una tortilla di farina di grano riempita con carne di bovino, pollo o maiale, che è poi chiusa ottenendo una forma sottile.",
            "price" => 6.00,
            "image" => "https://www.fattoincasadabenedetta.it/wp-content/uploads/2023/02/Burrito0105.jpg",
            "available" => true,
            "restaurant_id" => 6
        ],
        [
            "id" => 12,
            "name" => "Mex Tacos",
            "description" => "I taco tex-mex hanno un ripieno più standardizzato che consiste di carne macinata cotta in spezie considerate messicane, formaggio grattugiato, pezzetti di pomodoro crudo, lattuga e salsa di pomodoro più o meno piccante.",
            "price" => 7.50,
            "image" => "https://www.melarossa.it/wp-content/uploads/2020/12/tacos.jpg",
            "available" => true,
            "restaurant_id" => 6
        ]
    ],
    'types' => [
        [
            "id" => 1,
            "name" => 'Italiano'
        ],
        [
            "id" => 2,
            "name" => 'Americano'
        ],
        [
            "id" => 3,
            "name" => 'Cinese'
        ],
        [
            "id" => 4,
            "name" => 'Giapponese'
        ],
        [
            "id" => 5,
            "name" => 'Messicano'
        ],
        [
            "id" => 6,
            "name" => 'Indiano'
        ],
        [
            "id" => 7,
            "name" => 'Pesce'
        ],
        [
            "id" => 8,
            "name" => 'Carne'
        ],
        [
            "id" => 9,
            "name" => 'Pizza'
        ],
        [
            "id" => 10,
            "name" => 'Sushi'
        ],
        [
            "id" => 11,
            "name" => 'Vegana'
        ],
        [
            "id" => 12,
            "name" => 'Panini'
        ]
        ],
    'user'=>[
        [
            'id' => 1,
            'name'=>'Marco',
            'surname'=>'Rinaldi',
            'email'=>'marcorinaldi@test.com',
            'password'=>'testtest'
        ],
        [
            'id' => 2,
            'name'=>'Francesco',
            'surname'=>'Rocco',
            'email'=>'francescorocco@test.com',
            'password'=>'testtest'
        ],
        [
            'id' => 3,
            'name'=>'Michele',
            'surname'=>'Santoro',
            'email'=>'michelesantoro@test.com',
            'password'=>'testtest'
        ],
        [
            'id' => 4,
            'name'=>'Stefano',
            'surname'=>'Alesci',
            'email'=>'stefanoalesci@test.com',
            'password'=>'testtest'
        ],
        [
            'id' => 5,
            'name'=>'Carmine',
            'surname'=>'Faella',
            'email'=>'carminefaella@test.com',
            'password'=>'testtest'
        ],
        [
            'id' => 6,
            'name'=>'Mario',
            'surname'=>'Rossi',
            'email'=>'mariorossi@test.com',
            'password'=>'testtest'
        ]
        ],
    'orders'=>[
        [
            'id'=>'1',
            'guest_name'=>'Carmine',
            'guest_surname'=>'Faella',
            'guest_email'=>'carminefaella@test.it',
            'guest_address'=>'test address',
            'guest_phone'=>'0123456789',
            'amount'=>'100',
            'status'=>'1',
            'date'=>'2023-06-21',
            "dish_id" => [1,2],
            'restaurant_id'=>'1'
        ],
        [
            'id'=>'2',
            'guest_name'=>'Francesco',
            'guest_surname'=>'Rosso',
            'guest_email'=>'francescorocco@test.it',
            'guest_address'=>'test address',
            'guest_phone'=>'0123456789',
            'amount'=>'50',
            'status'=>'0',
            'date'=>'2023-06-21',
            "dish_id" => [3,4],
            'restaurant_id'=>'2'
        ],
        [
            'id'=>'3',
            'guest_name'=>'Stefano',
            'guest_surname'=>'Alesci',
            'guest_email'=>'stefanoalesci@test.it',
            'guest_address'=>'test address',
            'guest_phone'=>'0123456789',
            'amount'=>'60',
            'status'=>'1',
            'date'=>'2023-06-21',
            "dish_id" => [5,6],
            'restaurant_id'=>'3'
        ],
        [
            'id'=>'4',
            'guest_name'=>'Marco',
            'guest_surname'=>'Rinaldi',
            'guest_email'=>'marcorinaldi@test.it',
            'guest_address'=>'test address',
            'guest_phone'=>'0123456789',
            'amount'=>'40',
            'status'=>'1',
            'date'=>'2023-06-21',
            "dish_id" => [7,8],
            'restaurant_id'=>'4'
        ],
        [
            'id'=>'5',
            'guest_name'=>'Michele',
            'guest_surname'=>'Santoro',
            'guest_email'=>'michelesantoro@test.it',
            'guest_address'=>'test address',
            'guest_phone'=>'0123456789',
            'amount'=>'200',
            'status'=>'1',
            'date'=>'2023-06-21',
            "dish_id" => [9,10],
            'restaurant_id'=>'5'
        ],
        [
            'id'=>'6',
            'guest_name'=>'Marco',
            'guest_surname'=>'Rossi',
            'guest_email'=>'marcorossi@test.it',
            'guest_address'=>'test address',
            'guest_phone'=>'0123456789',
            'amount'=>'20',
            'status'=>'0',
            'date'=>'2023-06-21',
            "dish_id" => [11,12],
            'restaurant_id'=>'6'
        ]
        
    ]
];
