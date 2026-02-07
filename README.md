# 🚀 Desafio DIO: Modernização de Microsserviços (Stack 2026)

Este projeto é uma evolução do desafio prático inspirado em **Toshiro Shibakita**. Originalmente concebido em 2022, ele foi totalmente refatorado para os padrões atuais de infraestrutura como código (IaC), containerização otimizada e observabilidade.

## 🛠️ O que mudou? (Legacy 2022 vs Modern 2026)

| Característica | Projeto Original (2022) | Esta Versão (2026) |
| :--- | :--- | :--- |
| **Arquitetura** | Monolítica/Manual | Microsserviços Orquestrados |
| **IPs** | Hardcoded (Fixos) | Service Discovery via Docker Network |
| **PHP** | Instalado na Host/EC2 | Container PHP 8.2-FPM (Alpine) |
| **Segurança** | Credenciais no código | Variáveis de Ambiente (`.env`) |
| **Escalabilidade** | Manual | Suporte a réplicas via Docker Compose |
| **Monitoramento** | Inexistente | cAdvisor Nativo (Opcional) |

## 🏗️ Arquitetura do Projeto

A solução utiliza **Nginx** como Proxy Reverso, encaminhando requisições para um pool de containers **PHP-FPM**, que persistem dados em um banco **MySQL 8.0**.

- **Nginx:** Porta 80 (ponto de entrada).
- **PHP-FPM:** Processamento da lógica e conexão via `mysqli`.
- **MySQL:** Persistência de dados com script de inicialização automática (`banco.sql`).

## 🚀 Como Rodar

### 1. **Clone o repositório:**

   ```bash
   git clone https://github.com/CrisisUp/desafio-toshiro-shibakita.git
   cd desafio-toshiro-shibakita
   ```

### 2. Subida da InfraestruturaExecute o comando para construir e iniciar os serviços

   ```bash
   docker compose up -d --build
   ```

### 3. Endereços de Acesso (Stack Ativa)

| Serviço | Endereço Local | Função |
| :--- | :--- | :--- |
| **Aplicação PHP** | [http://localhost](http://localhost) | Landing page que gera registros no banco |
| **Prometheus** | [http://localhost:9090](http://localhost:9090) | Banco de dados de métricas e consultas (PromQL) |
| **cAdvisor** | [http://localhost:8081](http://localhost:8081) | Exportador de métricas de hardware dos containers |

### 4. Para conferir se os dados aleatórios estão sendo gravados corretamente

   ```bash
   docker compose exec db mysql -u root -pSenhaSegura123 -e "USE meubanco; SELECT * FROM dados;"
   ```
