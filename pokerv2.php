<?php
    $suits = ['♠', '♥', '♦', '♣'];
    $ranks = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];

    // 創建一副牌
    $deck = [];
    foreach ($suits as $suit) {
        foreach ($ranks as $rank) {
            $deck[] = $rank . $suit;
        }
    }

    // 洗牌函數
    function shuffleDeck(&$deck)
    {
        shuffle($deck);
    }

    // 發牌函數
    function dealCards(&$deck, $numCards)
    {
        return array_splice($deck, 0, $numCards);
    }

    // 顯示牌函數
    function showCards($cards)
    {
        foreach ($cards as $card) {
            echo $card . " ";
        }
        echo "<br>";
    }

    // 理牌函數
    function sortCards(&$cards)
    {
        sort($cards);
    }

    // 洗牌
    shuffleDeck($deck);

    // 發牌
    $hand = dealCards(
        $deck,
        13,
    );

    // 顯示手牌
    echo "發出的牌：";
    showCards($hand);

    // 理牌
    sortCards($hand);
    echo "理好的牌：";
    showCards($hand);

