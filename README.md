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

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/CrisisUp/desafio-toshiro-shibakita.git
   cd desafio-toshiro-shibakita
   ```
