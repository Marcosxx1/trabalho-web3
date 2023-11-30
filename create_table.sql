CREATE TABLE categoria (
    id SERIAL PRIMARY KEY,
    nomeCategoria VARCHAR(255),
    descricao TEXT
);

CREATE TABLE fornecedor (
    id SERIAL PRIMARY KEY,
    nomeFornecedor VARCHAR(255),
    cnpj VARCHAR(20)
);

CREATE TABLE pedido (
    id SERIAL PRIMARY KEY,
    status VARCHAR(255),
    data DATE
);

CREATE TABLE produto (
    id SERIAL PRIMARY KEY,
    img VARCHAR(255),
    nome VARCHAR(255),
    quantidade INTEGER,
    preco DECIMAL(10, 2),
    fornecedor_id INTEGER REFERENCES fornecedor(id),
    categoria_id INTEGER REFERENCES categoria(id)
);
select * from produto 


CREATE TABLE review (
    id SERIAL PRIMARY KEY,
    avaliacao INTEGER,
    descricao TEXT, -- Add this line
    produto_id INTEGER REFERENCES produto(id),
    usuario_id INTEGER REFERENCES usuario(id)
);
select * from review 



CREATE TABLE usuario (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255),
    cep VARCHAR(10),
    numero_casa VARCHAR(10),
    email VARCHAR(255),
    senha VARCHAR(255)
);
 