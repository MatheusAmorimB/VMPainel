# Revisão rápida da base e tarefas sugeridas

## 1) Erro de digitação (texto/UX)
**Problema encontrado:** o título da página `painel.php` está com texto genérico de ferramenta (`Documento sem título`), que passa impressão de erro para o usuário.

- **Local:** `public/painel.php` linha 5.
- **Tarefa sugerida:** substituir o título por algo coerente com a tela, por exemplo `Painel VM - Pedidos`.
- **Critério de aceite:** ao abrir `painel.php`, a aba do navegador exibe o novo título e não há mais texto genérico.

## 2) Correção de bug (comportamento de menu responsivo)
**Problema encontrado:** o botão hamburger (`data-bs-target="#menu"`) aponta para um id inexistente, enquanto o menu colapsável usa `id="painel"`. Em telas pequenas, o botão não abre o menu.

- **Local:** `public/index.php` linhas 54 e 58.
- **Tarefa sugerida:** alinhar `data-bs-target` e `id` para o mesmo valor (ex.: ambos `#menu`/`menu`), validando o comportamento no mobile.
- **Critério de aceite:** em viewport pequena, clicar no botão expande/colapsa a navegação corretamente.

## 3) Ajuste de comentário ou documentação
**Problema encontrado:** existe comentário legado mencionando jQuery como dependência necessária do Bootstrap, mas o projeto usa Bootstrap 5 (que não depende de jQuery).

- **Local:** `public/index.php` linha 165.
- **Tarefa sugerida:** atualizar/remover o comentário para evitar orientação incorreta (ex.: `Bootstrap 5 não requer jQuery`).
- **Critério de aceite:** os comentários do arquivo não contradizem a versão atual do Bootstrap.

## 4) Melhoria de teste (cobertura de interação JS)
**Problema encontrado:** não há teste automatizado garantindo que a troca de status da tabela altere texto e classe de badge corretamente.

- **Local funcional:** script de atualização de status em `public/index.php` linhas 14 a 46.
- **Tarefa sugerida:** criar teste E2E (Playwright/Cypress) que:
  1. abre `index.php`;
  2. clica em cada opção do dropdown (`Produção`, `Faturamento`, `Enviado`);
  3. valida texto da badge e classes (`bg-warning`, `bg-primary`, `bg-success`).
- **Critério de aceite:** teste falha se classes/texto não mudarem, e passa no fluxo esperado.
