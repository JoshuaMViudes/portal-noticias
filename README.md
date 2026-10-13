# API de Notícias

## Endpoints

### Notícias

| Método   | Endpoint             | Descrição              | Status HTTP   |
| -------- | -------------------- | ---------------------- | ------------- |
| `GET`    | `/api/noticias`      | Listar notícias        | `200 OK`      |
| `GET`    | `/api/noticias/{id}` | Visualizar uma notícia | `200 OK`      |
| `POST`   | `/api/noticias`      | Cadastrar notícia      | `201 Created` |
| `PUT`    | `/api/noticias/{id}` | Editar notícia         | `200 OK`      |
| `DELETE` | `/api/noticias/{id}` | Excluir notícia        | `200 OK`      |

#### Campos para cadastro e edição

Os endpoints `POST` e `PUT` recebem os seguintes campos:

- `categoria_id` — ID da categoria.
- `titulo` — Título da notícia.
- `resumo` — Resumo da notícia.
- `conteudo` — Conteúdo completo da notícia.
- `ativo` — Define se a notícia está ativa.
- `usuario_id` — ID do usuário responsável.

### Categorias

| Método | Endpoint          | Descrição         | Status HTTP |
| ------ | ----------------- | ----------------- | ----------- |
| `GET`  | `/api/categorias` | Listar categorias | `200 OK`    |

### Autenticação

| Método | Endpoint      | Descrição                         |
| ------ | ------------- | --------------------------------- |
| `POST` | `/api/login`  | Autenticar usuário                |
| `POST` | `/api/logout` | Encerrar a sessão de autenticação |

## Tokens de autenticação

```text
1|ezuvZWn1ZVpJ2CKig0aDCmwDhXFrVAWWpCbG83gH01abacd4

1|TYDKS8P6kZuqGIiUCeRFR6Tq696WiMkfM7hrZh9u603cb678
```

> **Atenção:** se esses valores forem tokens reais de autenticação, evite publicá-los no GitHub ou em outros locais públicos. Se já foram expostos, revogue-os e gere novos tokens.
