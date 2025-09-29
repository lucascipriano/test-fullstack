# Annotations

[//]: # 'Todas suas anotações sobre o projeto. Esse arquivo será mais importante que boa parte do projeto!'

Por algum motivo, o projeto mesmo configurado não está reconhecendo, então preciso utilizar `composer dump-autoload`para atualizar a resource.

Subreddit - Post - Comentário - Voto, models com mfc

# Final do primeiro dia

http://localhost:8000/home - painel público
http://localhost:8000/admin - painel admin

http://localhost:8000/public/login - login público

Deu para criar o projeto, configurar o banco de dados, criar as models e migrations, e fazer o relacionamento entre elas de boas.
Multipanes criado, porém preciso setar melhor o public, configurar o /admin só para admin.
O panel public está com 'guest', falta só configurar o auth, mas se logar no /admin com a conta normal, funciona.
Alterei muito do css padrão do Filament

Resumo do dia:

- Listando subreddits
- Listando posts dentro do subreddit

# Dia 2

- [ ] Listar comentários (Comentários criados, falta criar a página livewire)
- [x] Refatorar livewire, eu sei mexer carai (Fazer por último)
- [x] Fazer sistema de votos (dos posts por enquanto)
- [x] Arrumar a sidebar com subreddit (resource no panel public)

## Resumo do dia 2

- Sidebar com subreddits funcionando, mas está jogando para /admin pegando a outra cor, mesmo deixando public com default
- /Home refatorado, separado por component do livewire


# Dia 3

- [x] Fazer funcionar no notebook da mulher.
- [x] Listar comentários (Comentários criados, falta criar a página livewire)
- [ ] Arrumar dark/light mode

## Resumo do dia 3

Rodando no notebook com Windows e exibe rota do post do subreddit, precisa só listar os comentários com UI
Preciso fazer a tela de login para o user normal, apenas do /home(public)

Por estar no Windows, não consigo usar o pint, então vou dar um push com --no-verify
