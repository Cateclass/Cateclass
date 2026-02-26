# DOCUMENTAÇÃO DA APLICAÇÃO WEB
<div alingn="center">

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h3 align="center">
CENTRO PAULA SOUZA - FACULDADE DE TECNOLOGIA DE JAHU
</h3>

<p align="center">
Curso de Tecnologia em Desenvolvimento de Software Multiplataforma<br>
Jahu, SP<br>
Início: 3º semestre/2026
</p>


**Autores:**

 - [Matheus Paschuinio](https://www.linkedin.com/in/matheus-paschuinio-7630aa336/)
 - [Pedro Paulo]( https://www.linkedin.com/in/pedro-paulo-00114a256/)

---

# 0. SUMÁRIO  

1. [RESUMO DA APLICAÇÃO WEB](#1-resumo-da-aplicação-web)  
2. [OBJETIVO](#2-objetivo)  
3. [MÉTODOS DA PESQUISA](#3-métodos-da-pesquisa)  
4. [DOCUMENTO DE REQUISITOS](#4-documento-de-requisitos)
   - [Requisitos funcionais](#41-requisitos-funcionais)
   - [Requisitos não funcionais](#42-requisitos-não-funcionais)
5. [REGRAS DE NEGÓCIO](#5-regras-de-negócio)  
6. [ESTUDO DE VIABILIDADE](#6---estudo-de-viabilidade)  
   - [Viabilidade Técnica](#61-viabilidade-técnica)  
   - [Viabilidade Econômica](#62-viabilidade-econômica)  
   - [Viabilidade Operacional](#63-viabilidade-operacional)  
   - [Viabilidade de Mercado](#64-viabilidade-de-mercado)  
7. [MODELO DE DADOS](#7-modelo-de-dados)  
   - [Modelo de Caso de Uso](#71-modelo-de-caso-de-uso)  
   - [Modelo Conceitual](#72-modelo-conceitual)  
   - [Modelo Lógico](#73-modelo-lógico)  
8. [DESIGN](#8-design)  
9. [PROTÓTIPO](#9-protótipo)  
10. [APLICAÇÃO](#10-aplicação)  
11. [CONSIDERAÇÕES FINAIS](#11-considerações-finais)  
12. [REFERÊNCIAS BIBLIOGRÁFICAS](#12-referências-bibliográficas)  

---

## 1. RESUMO DA APLICAÇÃO WEB 
O Cateclass é uma plataforma desenvolvida para facilitar a comunicação e a organização na catequese. Muitas vezes, catequistas, pais e catequizandos enfrentam dificuldades com a troca de informações e o controle das atividades. O sistema busca centralizar essas informações, tornando a comunicação mais rápida, prática e acessível.

---

## 2. OBJETIVO  
- Facilitar a comunicação entre a paróquia, catequistas, pais e catequizandos.

- Organizar encontros, eventos e comunicados da catequese.

- Oferecer um ambiente acessível via computador ou celular.

---

## 3. MÉTODOS DA PESQUISA  
 
 Para o desenvolvimento do cateclass foi adotada uma abordagem aplicada e exploratoria,buscando compreender e solucionar um problema real enfrentado nas comunidades paroquiais: a dificuldade de comunicação entre a catequistas,pais e catequizandos.

 o processo  de pesquisa foi conduzido com base em atividades e orientações disponibilizadas no google classroom,onde o grupo estruturou as etapas de desenvolvimento,planejamento e validação do projeto,Dessa forma,todo  o  trabalho foi fundamentado em conteúdos apresentados em sala nas discussões ao longo do semesetre

 As etapas da pesquisa foram organizadas da seguinte forma:

 ### 3.1 Levantamento de Requisitos 

 A primeira etapa consistiu em identificar as principais necessidades da catequese,observando as dificuldades na troca de informações entre catequistas e pais, além do gerenciamento de atividades e envio de comunicados.
 Essa informações  serviram de base para definir os os requisistos funcionais e não funcionis do sistema, dempre com o objetivo de criar uma solução pratica e eficiente.


### 3.2 Análise e estudo Teórico 

Com base nas atividades e materiais disponibilizados pelo Professor no classroom,o grupo estudou conceitos sobre engenharia de software,levantamento de requisitos e prototipagem,aplicando essas referências na elaboração dos modelos e na organização do projeto.
 

### 3.3 Modelagem e prototipagem  

 Após a definição dos requisitos,foram criados os  mdoelos de diagramas de caso de uso,diagrama de classes,modelo conceitual e modelo lógico,representando as principais interações do sistema e suas entidades.
 Em seguida,o grupo elaborou um protótipo das telas,permitindo visualizar como seria a navegação e a estrutura da aplicação.

### 3.4 Desenvolvimento da aplicação 

com os modelos prontos,inciou-se a etapa de desenvolvimento do sistema,utilizando ferramentas de programação web e seguindo os conceitos apresentados em aula,o objetivo foi construir uma aplicação funcional, de facíl uso e que pudesse ser acessada tanto por computador quanto por dispositivos móveis.


### 3.5 Teste e validação

 na fase final,o grupo realizou testes internos para verificar o funcionamento das principais funcionalidades e corrigir evntuais falhas,além disso,foram feito ajustes de usabilidade e alinhamentos com as necessidades observadas na fase final.


 Por meio dessas etapas,o projeto Cateclass foi desenvolvido de forma colaborativa  estruturada,unindo a teoria estudada no curso com a prática da construnção de um sistema real,o método aplicado permitiu que o grupo compreendesse todas as etapas do processo de desenvolvimento de software,desde a identifcação do problema até a entrega da solução final.

 ---

## 4. DOCUMENTO DE REQUISITOS  

Um Documento de Requisitos de Sistema é parte essencial no desenvolvimento de software, pois deve descrever, detalhadamente, as funcionalidades, características e restrições que o sistema deve atender. Esse documento inclui requisitos funcionais (ações que o sistema deve executar), requisitos não funcionais (como desempenho, segurança e usabilidade) e possíveis restrições técnicas. Com a definição clara dos requisitos, evita-se falhas na comunicação, reduz-se os riscos no desenvolvimento e garante-se que o produto final atenda às expectativas dos usuários e os objetivos do projeto.

### 4.1 Requisitos funcionais  
- 2.1.1 RF1 - Gerenciar Usuários
- 2.1.2 RF2 - Realizar Login
- 2.1.3 RF3 - Recuperar Senha
- 2.1.4 RF4 - Gerenciar Turmas
- 2.1.5 RF5 - Gerenciar Catequizandos
- 2.1.6 RF6 - Realizar Inscrição em Turma
- 2.1.7 RF7 - Publicar Avisos (Mural)
- 2.1.8 RF8 - Publicar Materiais
- 2.1.9 RF9 - Criar Atividades
- 2.1.10 RF10 - Entregar Atividades
- 2.1.11 RF11 - Dar Feedback de Atividades
- 2.1.12 RF12 - Apresentar Agenda/Calendário
- 2.1.13 RF13 - Registrar Frequência
- 2.1.14 RF14 - Acompanhamento do Catequizando
- 2.1.15 RF15 - Sistema de Mensagens
- 2.1.16 RF16 - Exibir Informações Sobre o Projeto/Paróquia
- 2.1.17 RF17 - Contato

### 4.2 Requisitos não funcionais  
- 2.2.1 RNF1 - Desempenho
- 2.2.2 RNF2 - Segurança
- 2.2.3 RNF3 - Usabilidade
- 2.2.4 RNF4 - Disponibilidade
- 2.2.5 RNF5 - Manutenibilidade
- 2.2.6 RNF6 - Compatibilidade

---

## 5. MODELO DE NEGÓCIO  
![modelos de Negócio do projeto Cateclass](/docs/modelodenegocios.jpg)

---

## 6. ESTUDO DE VIABILIDADE  

 tem como objetivo analisar se o projeto cateclass pode ser realmente colocado em prática,considerando os três pontos principais:a parte técnica,a econômica e a operacional,essa análise ajuda a entender se o sistema é possível de ser desenvolvido com os recursos disponíveis e se ele realmente atende ao propósito para o qual foi criado.


### 6.1 viabilidade técnica

A parte tecnica do projeto foi considera totalmente viável,o cateclass foi desenvolvido com o uso de ferramentas e tecnologias acessíveis,que são bastante conhecidas e gratuitas,foram utilizadas linguagens com HTML,CSS,PHP,MYSQL,além do Github,que serviu para o controle de versão eo trabalho em equipe.
Essas tecnologias permitem que o sistema funcione bem tanto em computadores quanto em celulares,oferecendo praticidade e facilidade na manutenção,Durante o desenvolvimento ,o grupo utilizou os computadores e a internet da Fatec Jahu,o que garantiu um ambiente adequado para testar e aprimorar o sistema.


### 6.2 viabilidade econômica

Por se tratar de um projeto acadêmico e experimental,o desenvolvimento do cateclass não gerou custos financeiros diretos,já que todas as ferramentas utilizadas são gratuitas,Os únicos "custos"envolvidos foram o tempo e a dedicação do grupo, além do uso dos equipamentos pessoais,como notebooks e acesso á internet.
Parte do trabalho foi feita na Fatec Jahu,utilizando os computadores e a internet da instituição,e outra parte foi realizada em casa,com recursos próprios,Por isso, a viabilidade econômica é considerada totalemnte favorável.o sistema pode ser desenvolvido sem gastos adicionais,aproveitando bem os recursos disponíveis,tanto na faculdade quanto dos integrantes do grupo.


### 6.3 viabilidade operacional

A viabilidade operacional também é posistiva,pois o cateclass foi pensando para ser simples,intuitivo e fácil de usar.A navegação é clara,o design é leve e as funções são diretas,o que facilita o uso por catequistas,coordenadores e catequizandos,o o sistema realmente cumpre o que se propõe:a melhorar a comunicação e a organização dentro da catequese,por isso,o projeto cateclass se mostra viável em todos os aspectos-técnico,econômico e operacionalnunido o aprendizado em sala de aula á pratica de desenvolver uma solução útil e aplicável na vida real.

### 6.4 viabilidade de mercado

a visibilidade de mercado do cateclass mostra  que o sistema atende uma necessidade real nas comunidades religiosas,que ainda enfrentam dificuldades de comunicação e organização entre catequistas,coordenadores e catequizandos,o projeto oferece uma alternativa simples,acessível e prática em relação aos métodos tradicionais omo envio de mensagens e avisos,por ser fácil de usar e sem custos,o cteclass tem potencial para ser adotado por diversas paróquias e instituições que desejam modernizar a sua gestão de forma eficiente.

---

## 7. Modelo de Caso de Uso
![Modelos de casos de uso](/docs/CasosdeUso.png)

---

### 8. Modelo Conceitual 

![modelo conceitual](/docs/modeloconceitual.jpg)

---


### 9. Modelo Lógico  

![Banco de dados](/docs/bancodados.jpg)

---

## 10. design 

o design do cateclass foi desenvolvido com foco na harmonia entre fé, tecnologia e usabilidade,buscando transmitir acolhimento,organização e modernidade,cada elemento visual e desde das cores até a tipografia e o logotipo foi pensado para refletir a essência do projeto:um ambiente digital que une aprendizado e espiritualidade de forma simples,acessível e inspiradora.

### 10.1 Paleta de Cores

a paleta de cores do cateclass foi escolhida para transmitir equilíbrio entre fé,serenidade e modernidade,combinando tons neutros com cores vibrantes que representam organização,acolhimento e energia.

| Cor | Código |
|------|---------|
| <div style="width:90px;height:25px;background-color:#2C3E50;color:white;text-align:center;line-height:25px;border-radius:6px;">#2C3E50</div> | `#2C3E50-cinza` |
| <div style="width:90px;height:25px;background-color:#3498DB;color:white;text-align:center;line-height:25px;border-radius:6px;">#FFFFFF</div> | `#FFFFFF-Branco` |
| <div style="width:90px;height:25px;background-color:#E67E22;color:white;text-align:center;line-height:25px;border-radius:6px;">#008000</div> | `#008000-verde forte` |
| <div style="width:90px;height:25px;background-color:#ECF0F1;color:black;text-align:center;line-height:25px;border-radius:6px;border:1px solid #ccc;">#E5ECFF</div> | `#E5ECFF-Azul Mais Fraco` |

---


### 10.2 Tipografia
  a tipografia usada na aplicação é:
  Roboto: a escolha deve-se ao fato de ser uma fonte moderna, legível
   e com uma boa usabilidade.
  Inter: Legibilidade superior para telas, design moderno e otimizado
   para a web.

---

### 10.3 Logo
![Logo Cateclass](/docs/logo-cateclass.png)

o logotipo do cateclass representa a união entre fé e aprendizado,o livro aberto simboliza o conhecimento e o ensino da catequese,enquanto a cruz no centro expressa a fé cristã que guia o projeto,as cores suaves transmitem acolhimento e serenidade,reforçando a proposta do sistema de ser um ambiente moderno,acessível e voltado á evangelização.

---

### 10.4 Modelo de Navegação

![Modelos de navegação](/docs/modelodenavegacao.png)

o modelo de navegação do cateclass mostra de forma como o usuário percorre as principais funções do sistema,garantindo uma experiência simples e organizada,ele começa com o usuário,que pode acessar diferentes áreas de acordo com sua necessidade, entre essas áreas estão o gerenciamento de usuários,onde é possível fazer login, cadastro e recuperação de senha,o gerenciamento de trumas que permite acompanhar os catequizandos e visualizar o desempenho de cada um,e as atividades, onde é possível entregar tarefas e se comunicar pelo sistemas de mensagens entre os usuarios,esse modelo representa a estrutura de navegação do sistema,destacando a conexão entre as funcionalidades e facilidade de uso para todos os tipos de usuários.

---

## 11. PROTÓTIPO  

a Interface de login principal que permite a autenticação via Email/Senha 

![login catequizandos](/docs/login.catequizando.png)

---

Tela utilizada pelo usuário para ingressar em uma turma existente através da inserção de um código de 6 dígitos.
![tela login](/docs/tela.login.catequizandos.png)

---

Visão geral da plataforma, apresentando o resumo de dados, acesso a turmas e opções rápidas para gerenciamento.
![dasboard da coordenador(a)](/docs/dash.corde.png)

---

## 12. APLICAÇÃO  

 o cateclass é uma aplicação web desenvolvida para facilitar a organização da catequese,oferecendo recursos como gerenciamento de turmas,envio de atividades,mural de avisos e comunicação entre catequistas e catequizando,a plataforma foi construída com tecnologias acessíveis como HTML,CSS,PHP E MYSQL,garatindo usabilidade e compatibilidade com computadores e celulares,seu design prioriza simplicidade,navegação intuitiva e fácil acesso ás principais funções,durante o desenvolvimento,form relizados testes internos para validar as funcionalidades e assegurar um uso eficiente,a aplicação representa uma solução prática,moderna e totalmente viável para paróquias e comunidades religiosas.
 
---

## 13. CONSIDERAÇÕES FINAIS  

 o desenvolvimento do cateclass foi uma experiência muito importante e enriquecedora para o grupo,Desde o inicío,nosso objetivo foi criar uma ferramenta simples,acessível e útil para melhorar a comunicação e gerenciar a atividade dentro da catequese,durante o processo,conseguimos aplicar na prática o que aprendemos em sala de aula,unindo teoria,tecnologia e colaboração em equipe.
 
 Mesmo com alguns desafios no caminho,como a saída de um dos integrantes do grupo e a correria do semestre,conseguimos seguir firmes e concluir o projeto com dedicação,a mudança da antinga ideia da Escolink para o cateclass exigiu bastante esforço e adaptação,mas foi uma transição muito positiva,que resultou em um sistema mais completo,moderno e alinhado ao propósito do curso.
 
 o maior obstáculo que enfretamos foi, sem dúvida, a falta de tempo,com as atividades da faculdade,outras disciplinas e compromissos pessoais,nem sempre foi fácil equilibrar tudo,ainda assim,nos organizamos  da melhor forma possível:dividimos tarefas conforme as habilidades de cada um,usamos Github para acompanhar  o andamento do projeto e aproveitamos os recursos da Fatec,como os computadores e a internet,para otimizar o trabalho.
 
 Apesar das dificuldades,o resultado foi muito satisfatório, o cateclass mostrou ser uma sistema viável,com grande potencial par ajudar as comunidades religiosas e facilitar o dia a dia dos catequistas,coordenadores e catequizandos,Além de aprender sobre tecnologia,apremdemos também sobre trabalho em equipe, repsonsabilidade e perseverança.
 
  no próximo semestre,o cateclass deverá continuar crescendo,com a implementação de novas funções e melhorias,a ideia é evoluir o sistemas,deixar ele cada vez mais completo, interativo e próximo da realidade de quem vai utilizá-lo,queremos que o software continue sendo aprimorado a cada etapa,sempre com foco em oferecer uma ferramenta útil,prática e acolhedora.
  
 Por fim,fica o semtimento de dever cumprido e de gratidão,Mesmo com pouco tempo e muito desafios,o aprendizado foi enorme, o projeto nos mostrou que,com esforço e união,é possível transformar uma ideia simples em algo que pode realmente fazer a diferença, o cateclass é apenas o começo de um trabalho que ainda tem muito a evoluir e que certamente continuará crescendo junto com a nossa jornada como desenvolvedores.
 
---

## 14. REFERÊNCIAS BIBLIOGRÁFICAS  
FIGMA. Figma: The collaborative interface design tool. [Software]. São
Francisco: Figma, [s.d.]. Disponível em: https://www.figma.com. Acesso em: 16 jun.2025.

PRESSMAN, R. S. Engenharia de Software: uma abordagem profissional. 8 ed.
Porto Alegre: AMG, 2016.

SEBRAE. CANVAS. Portal SEBRAE, 2021. Disponível em: &lt;
https://sebrae.com.br/sites/PortalSebrae/produtoseservicos/conteudos/canvas,02d9d
1159cbfe610VgnVCM1000004c00210aRCRD &gt;. Acesso em: 01 jun. 2025.

SOMMERVILLE, I. Engenharia de Software, 9 ed. São Paulo: Pearson Prentice
Hall, 2011.
