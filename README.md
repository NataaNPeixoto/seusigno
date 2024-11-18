
## Seu Signo

Projeto desenvolvido para a disciplina "Programação Web" do curso de ADS, com o objetivo de praticar conceitos de HTML, CSS, PHP e XML.

Este projeto web tem como objetivo fornecer aos usuários uma forma simples e intuitiva de descobrir seu signo do zodíaco com base na data de nascimento. Através de um design moderno e responsivo, o usuário insere sua data de nascimento em um formulário e recebe informações detalhadas sobre seu signo, incluindo características e descrição.

### Estrutura do Projeto
O projeto está organizado da seguinte forma:

* **index.php:** Página principal onde o usuário insere a data de nascimento.
* **show_zodiac_sign.php:** Página que processa os dados do formulário e exibe o resultado.
* **header.php:** Contém o cabeçalho do site, incluindo o título, meta tags e links para arquivos CSS.
* **footer.php:** Contém o rodapé do site, com informações de copyright.
* **signos.xml:** Arquivo XML que armazena os dados de cada signo do zodíaco, como data de início, data de fim, nome e descrição.
* **style.css:** Arquivo CSS responsável pelo estilo visual do site, incluindo layout, cores e tipografia.

### Funcionamento

* O usuário acessa a página inicial (index.php).
* O usuário insere sua data de nascimento no campo fornecido.
* Ao clicar no botão "Ver meu signo", os dados são enviados para o arquivo show_zodiac_sign.php.
* O arquivo show_zodiac_sign.php:
* Lê o arquivo XML e armazena os dados dos signos em uma variável.
* Compara a data de nascimento informada pelo usuário com as datas de início e fim de cada signo.
* Quando encontra o signo correspondente, exibe o nome e a descrição do signo na tela.
* Caso não encontre o signo, exibe uma mensagem de erro.

### Tecnologias Utilizadas

* **HTML**: Linguagem de marcação para estruturação das páginas.
* **CSS**: Linguagem de estilo para definir a aparência visual do site.
* **PHP**: Linguagem de programação para a lógica do servidor, responsável por processar os dados do formulário e gerar a saída dinâmica.
* **XML**: Linguagem de marcação para armazenar os dados dos signos de forma estruturada.
* **Bootstrap**: Framework CSS utilizado para criar layouts responsivos e estilos pré-definidos.
* **Google Fonts**: Fontes personalizadas utilizadas para melhorar a estética do site.

### Instalação e Uso
* **Servidor web**: Para executar o projeto, é necessário um servidor web como o Apache ou Nginx.
* **PHP**: O servidor web deve ter o PHP instalado e configurado.
* **Arquivos**: Copie todos os arquivos do projeto para o diretório raiz do seu servidor web.
* **Permissões**: Certifique-se de que o servidor web tenha permissão para ler e escrever no arquivo XML.
* **Acesso**: Acesse o site através do seu navegador, digitando o endereço do seu servidor e o nome do arquivo index.php (por exemplo, http://localhost/seu_projeto/index.php).
