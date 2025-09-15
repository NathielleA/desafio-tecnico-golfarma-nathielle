# desafio-tecnico-golfarma-nathielle

📘 **Desafio Técnico – Backend (Laravel + Docker)**

## 🚀 Tecnologias utilizadas

- **Laravel 10**
- **Docker**
- **Docker Compose**
- **MySQL 8**
- **Laravel Sanctum** (autenticação)

---

## ⚙️ Como rodar o projeto

### 1. Pré-requisitos

- **Docker Desktop** instalado
- **Git** já configurado (para clonar o repositório)

### 2. Clonar o repositório

```bash
git clone https://github.com/SEU_USUARIO/desafio-tecnico-golfarma-nathielle.git
cd desafio-tecnico-golfarma-nathielle/backend
```

### 3. Criar os arquivos de ambiente

Copie o `.env.example` para `.env`:

```bash
cp .env.example .env
```

Atualize as credenciais do banco no `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

### 4. Subir containers com Docker

```bash
docker compose up -d --build
```

### 5. Instalar dependências

```bash
docker compose exec laravel.test composer install
docker compose exec laravel.test php artisan key:generate
docker compose exec laravel.test php artisan migrate
```

### 6. Acessar aplicação

Abra no navegador:  
👉 [http://localhost:8000](http://localhost:8000)

---

## 🔑 Autenticação (Laravel Sanctum)

### Rotas públicas

#### **Criar usuário**

`POST /api/register`

```json
{
    "name": "Maria",
    "email": "maria@email.com",
    "password": "123456"
}
```

#### **Login e retorno de token**

`POST /api/login`

```json
{
    "email": "maria@email.com",
    "password": "123456"
}
```

**Copie o token retornado pela resposta e utilize-o nas próximas requisições!**

---

### Rotas autenticadas  
**(enviar Header: `Authorization: Bearer SEU_TOKEN` - o token precisa ser colocado sem aspas ("")!)**

- #### **Criar pedido**

`POST /api/pedidos`

```json
{
    "cliente": "João",
    "total": 199.90,
    "status": "pendente"
}
```

- #### **Listar pedidos**

`GET /api/pedidos`

- #### **Detalhes do pedido**

`GET /api/pedidos/{id}`

- #### **Atualizar pedido**

`PUT /api/pedidos/{id}`

```json
{
    "status": "concluido"
}
```

- #### **Remover pedido**

`DELETE /api/pedidos/{id}`

- #### **Logout (revoga token)**

`POST /api/logout`

---

## 🧪 Testes automáticos (se necessário)

Para rodar os testes:

```bash
docker compose exec laravel.test php artisan test
```

---

## 📂 Estrutura de diretórios importantes

```
backend/
 ├── app/
 │   ├── Http/Controllers/API/OrderController.php
 │   ├── Http/Controllers/API/AuthController.php
 │   └── Models/Order.php
 ├── database/migrations/
 │   └── xxxx_create_orders_table.php
 ├── docker-compose.yml
 ├── Dockerfile
 ├── .env
 └── README.md
```

---
## Autoria
- NATHIELLE CERQUEIRA ALVES [ [https://github.com/nathiellecerqueira](https://github.com/nathiellecerqueira) ]