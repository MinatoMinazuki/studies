const quiz = [
    {
        question: 'ゲーム市場最も売れたゲーム機は次のうちどれ？',
        answers: [
            'スーパーファミコン',
            'プレイステーション2',
            'ニンテンドースイッチ',
            'ニンテンドーDS'
        ],
        correct: 'ニンテンドーDS',
    },
    {
        question: '2023/5/12に任天堂から発売されたニンテンドースイッチのソフトは？',
        answers: [
            'ゼルダの伝説 Tears of the Kingdam',
            'マリオカート９',
            '信長の野望 for Switch',
            'テトリス99'
        ],
        correct: 'ゼルダの伝説 Tears of the Kingdam',
    },
    {
        question: 'ポケットモンスターSVに登場する生徒会長は？',
        answers: [
            'ボタン',
            'ネモ',
            'ペッパー',
            'オモダカ'
        ],
        correct: 'ネモ',
    },
    {
        question: 'カービィのエアライドに登場する、３つのパーツを集めて完成させる乗り物はドラグーンと何？',
        answers: [
            'デビルスター',
            'ウィングスター',
            'ハイドラ',
            'ヘビィスター'
        ],
        correct: 'ハイドラ',
    },
    {
        question: 'マリオカートダブルダッシュが発売された機種は？',
        answers: [
            'ゲームボーイアドバンス',
            'ゲームキューブ',
            'Wii',
            'ニンテンドー3DS'
        ],
        correct: 'ゲームキューブ',
    },
];

const quizLength = quiz.length;
let quizIndex = 0;
let score = 0;
let wrong = 0;

const $button = document.getElementsByTagName('button');
const buttonLength = $button.length;

//ランダムな問題表示
let randoms = [];
let min = 0;
let max = quizLength - 1;
for (let i = min; i <= max; i++) {
    while(true) {
        let tmp = intRandom(min,max);
        if(!randoms.includes(tmp)){
            randoms.push(tmp);
            break;
        }
    }
};
function intRandom(min,max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
};
console.log(randoms);

// ランダムな値を取り出す
const randomNum = () => {
    if (randoms.length > 0) {
        quizIndex = randoms[Math.floor(Math.random() * randoms.length)];
        console.log(quizIndex);
    };
};

//クイズの問題文、選択肢を定義
const setupQuiz = () => {

    document.getElementById('js-question').textContent = quiz[quizIndex].question;

    let buttonIndex = 0;
    while (buttonIndex < buttonLength){
        $button[buttonIndex].textContent = quiz[quizIndex].answers[buttonIndex];
        buttonIndex++;
    }
};

setupQuiz ();

const clickHandler = (e) => {
    if(quiz[quizIndex].correct === e.target.textContent) {
        window.alert('正解！');
        score++;
    } else {
        window.alert('不正解！答えは' + quiz[quizIndex].correct + 'です');
    }

    quizIndex++;

    if(quizIndex < quizLength){
        setupQuiz();
    } else{
        window.alert('終了！あなたの正解数は' + (score - wrong) + '/' + quizLength + 'です！');
        window.location.reload();
    }
};

//ボタンをクリックしたら正誤判定
let handlerIndex = 0;
while (handlerIndex < buttonLength) {
    $button[handlerIndex].addEventListener('click', (e) => {
        clickHandler(e);
    });
    handlerIndex++;
};