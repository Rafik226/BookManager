<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <ul>
        @foreach($produits as $produit)
            <li>{{ $produit->nom }} - {{ $produit->prix }} €</li>
        @endforeach
    </ul>
</body>
</html>
