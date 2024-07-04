// Banco de palavras agrupadas
const bancoDePalavras = {
    "Animais": ["cachorro", "gato", "pássaro", "peixe"],
    "Veículos": ["carro", "bicicleta", "moto", "ônibus"],
    "Frutas": ["maçã", "banana", "laranja", "uva"],
    "Móveis": ["mesa", "cadeira", "sofá", "cama"]
};

const grupoCores = {
    "Animais": "revealed-animal",
    "Veículos": "revealed-veiculo",
    "Frutas": "revealed-fruta",
    "Móveis": "revealed-movel"
};

// Seleciona elementos do DOM
const sortearBtn = document.getElementById('sortear');
const cardGrid = document.getElementById('card-grid');
const mensagem = document.getElementById('mensagem');
const tentativasDiv = document.getElementById('tentativas');
const resultadoDiv = document.getElementById('resultado');

let tentativas = 0;
let gruposRevelados = 0;
let palavrasSelecionadas = [];

// Função para embaralhar palavras
function embaralharPalavras() {
    let todasPalavras = [];
    for (const grupo in bancoDePalavras) {
        bancoDePalavras[grupo].forEach(palavra => {
            todasPalavras.push({ palavra, grupo });
        });
    }
    for (let i = todasPalavras.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [todasPalavras[i], todasPalavras[j]] = [todasPalavras[j], todasPalavras[i]];
    }
    return todasPalavras;
}

// Função para sortear grupos de palavras
function sortearGrupos() {
    tentativas = 0;
    gruposRevelados = 0;
    palavrasSelecionadas = [];
    cardGrid.innerHTML = '';
    mensagem.textContent = '';
    tentativasDiv.textContent = '';
    resultadoDiv.innerHTML = '';
    resultadoDiv.style.display = 'none';

    // Embaralha todas as palavras
    const palavrasEmbaralhadas = embaralharPalavras();

    // Exibe as palavras em cards individuais
    palavrasEmbaralhadas.forEach(item => {
        const card = document.createElement('div');
        card.className = 'card';
        const palavraElement = document.createElement('div');
        palavraElement.className = 'palavra';
        palavraElement.textContent = item.palavra;
        palavraElement.dataset.grupo = item.grupo;
        palavraElement.addEventListener('click', () => selecionarPalavra(item.grupo, palavraElement));
        card.appendChild(palavraElement);
        card.addEventListener('click', () => selecionarCard(card));
        cardGrid.appendChild(card);
    });
}

// Função para selecionar palavra
function selecionarPalavra(grupo, palavraElement) {
    if (palavraElement.classList.contains('revealed')) {
        return;
    }

    const index = palavrasSelecionadas.findIndex(p => p.element === palavraElement);
    if (index !== -1) {
        palavraElement.classList.remove('selected');
        palavrasSelecionadas.splice(index, 1);
    } else {
        if (palavrasSelecionadas.length === 4) {
            return;
        }
        palavraElement.classList.add('selected');
        palavrasSelecionadas.push({ grupo, element: palavraElement });
    }

    if (palavrasSelecionadas.length === 4) {
        tentativas++;
        verificarSelecao();
    }
}

// Função para selecionar o card inteiro
function selecionarCard(card) {
    if (card.classList.contains('card-selected')) {
        card.classList.remove('card-selected');
    } else {
        card.classList.add('card-selected');
    }
}

// Função para verificar a seleção
function verificarSelecao() {
    const gruposSelecionados = palavrasSelecionadas.map(p => p.grupo);
    const todosMesmoGrupo = gruposSelecionados.every(grupo => grupo === gruposSelecionados[0]);

    if (todosMesmoGrupo) {
        const grupo = gruposSelecionados[0];
        const corClasse = grupoCores[grupo];
        mensagem.textContent = 'Você acertou o grupo!';
        palavrasSelecionadas.forEach(p => {
            p.element.classList.remove('selected');
            p.element.classList.add(corClasse, 'revealed');
            p.element.removeEventListener('click', () => selecionarPalavra(p.grupo, p.element));
        });
        gruposRevelados++;
        if (gruposRevelados === 4) {
            jogoGanho();
        }
    } else {
        mensagem.textContent = 'Você errou, tente novamente!';
        palavrasSelecionadas.forEach(p => p.element.classList.remove('selected'));
    }
    palavrasSelecionadas = [];
    tentativasDiv.textContent = `Tentativas: ${tentativas}`;
}

// Função para finalizar o jogo
function jogoGanho() {
    resultadoDiv.innerHTML = `
        <div id="resultado-card">
            <h2>Parabéns! Você ganhou o jogo!</h2>
            <p>Total de tentativas: ${tentativas}</p>
            <button id="jogarNovamente" class="btn-primary">Jogar Novamente</button>
        </div>
    `;
    resultadoDiv.style.display = 'block';
    const jogarNovamenteBtn = document.getElementById('jogarNovamente');
    jogarNovamenteBtn.addEventListener('click', sortearGrupos);
}

// Adiciona evento ao botão de sortear
sortearBtn.addEventListener('click', sortearGrupos);
