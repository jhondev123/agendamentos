# Sistema de Agendamento

Este é um sistema de agendamento desenvolvido para gerenciar usuários, serviços, categorias, horários e reservas. Abaixo
está a descrição das tabelas do banco de dados e suas respectivas estruturas.

## Banco de Dados

### Tabelas

#### Users

- **Id** (Identificador único do usuário)
- **Name** (Nome do usuário)
- **Email** (E-mail do usuário)
- **Password** (Senha do usuário)
- **Phone** (Telefone do usuário)
- **IsAdmin** (Indica se o usuário é um administrador)
- **Created_at** (Data de criação do registro)
- **Updated_at** (Data de atualização do registro)
- **Deleted_at** (Data de exclusão do registro, se aplicável)

#### Categories

- **Id** (Identificador único da categoria)
- **Name** (Nome da categoria)
- **Description** (Descrição da categoria)
- **Created_at** (Data de criação do registro)
- **Updated_at** (Data de atualização do registro)
- **Deleted_at** (Data de exclusão do registro, se aplicável)

#### Services

- **Id** (Identificador único do serviço)
- **Name** (Nome do serviço)
- **Description** (Descrição do serviço)
- **Price** (Preço do serviço)
- **Duration** (Duração do serviço)
- **category_id** (Chave estrangeira referenciando a categoria do serviço)
- **Created_at** (Data de criação do registro)
- **Updated_at** (Data de atualização do registro)
- **Deleted_at** (Data de exclusão do registro, se aplicável)

#### Booking_status

- **Id** (Identificador único do status da reserva)
- **Name** (Nome do status)
- **Description** (Descrição do status)
- **Valores** (Valores possíveis para o status):
    - 1, Pending, Pending booking
    - 2, Accept, Accept Booking
    - 3, Refused, Refused booking
    - 4, Cancelled, Cancelled Booking

#### Hours

- **Id** (Identificador único do horário)
- **Hour** (Horário disponível)
- **available** (Indica se o horário está disponível)
- **Day** (Dia do horário)
- **Created_at** (Data de criação do registro)
- **Updated_at** (Data de atualização do registro)
- **Deleted_at** (Data de exclusão do registro, se aplicável)

#### Bookings

- **Id** (Identificador único da reserva)
- **Total_price** (Preço total da reserva)
- **total_duration** (Duração total da reserva)
- **Booking_status_id** (Chave estrangeira referenciando o status da reserva)
- **Notes** (Notas adicionais sobre a reserva)
- **User_id** (Chave estrangeira referenciando o usuário que fez a reserva)
- **Created_at** (Data de criação do registro)
- **Updated_at** (Data de atualização do registro)
- **Deleted_at** (Data de exclusão do registro, se aplicável)

#### Booking_services

- **Booking_id** (Chave estrangeira referenciando a reserva)
- **Service_id** (Chave estrangeira referenciando o serviço)
- **Hour_id** (Chave estrangeira referenciando o horário)
- **Price** (Preço do serviço na reserva)
- **Duration** (Duração do serviço na reserva)
- **Created_at** (Data de criação do registro)
- **Updated_at** (Data de atualização do registro)
- **Deleted_at** (Data de exclusão do registro, se aplicável)

## Casos de Uso

### Autenticação

#### Registrar

- **Descrição**: O usuário cria uma nova conta
- **Pré-condições**: O usuário não deve estar autenticado
- **Pós-condições**: O usuário é registrado no sistema
- **Fluxo principal**:
    1. O usuário acessa a página de registro
    2. O usuário preenche o formulário de registro
    3. O usuário envia o formulário
    4. O sistema valida os dados do formulário
    5. O sistema cria o usuário no banco de dados
    6. O sistema envia um e-mail de confirmação para o usuário
    7. O usuário confirma o e-mail
    8. O sistema ativa a conta do usuário
    9. O sistema redireciona o usuário para a página de login
    10. O sistema envia um e-mail de notificação para o administrador avisando que um novo usuário foi registrado

#### Login com conta existente

- **Descrição**: O usuário faz login com uma conta existente
- **Pré-condições**: O usuário não deve estar autenticado
- **Pós-condições**: O usuário é autenticado no sistema
- **Fluxo principal**:
    1. O usuário acessa a página de login
    2. O usuário preenche o formulário de login
    3. O usuário envia o formulário
    4. O sistema valida os dados do formulário
    5. O sistema autentica o usuário
    6. O sistema redireciona o usuário para a página inicial

#### Login com conta do Google

- **Descrição**: O usuário faz login com uma conta do Google
- **Pré-condições**: O usuário não deve estar autenticado
- **Pós-condições**: O usuário é autenticado no sistema
- **Fluxo principal**:
    1. O usuário acessa a página de login
    2. O usuário clica no botão de login com o Google
    3. O sistema redireciona o usuário para a página de login do Google
    4. O usuário faz login com a conta do Google
    5. O sistema redireciona o usuário para a página inicial

### Reserva

#### Criar reserva

- **Descrição**: O usuário cria uma nova reserva
- **Pré-condições**: O usuário deve estar autenticado
- **Pós-condições**: Uma nova reserva é criada no sistema
- **Fluxo principal**:
    1. O usuário seleciona os serviços que deseja reservar
    2. O usuário seleciona o horário da reserva
    3. O usuário confirma a reserva
    4. O sistema calcula o preço total e a duração total da reserva
    5. O sistema cria a reserva no banco de dados
    6. O sistema atualiza a disponibilidade do horário selecionado
    7. O sistema cria os registros de serviços na reserva
    8. O sistema envia um e-mail solicitando confirmação para o administrador
    9. O sistema envia um e-mail de notificação para o usuário avisando que teve sucesso na reserva

#### Cancelar reserva pelo usuário

- **Descrição**: O usuário cancela uma reserva existente
- **Pré-condições**: O usuário deve estar autenticado
- **Pós-condições**: A reserva é cancelada no sistema
- **Fluxo principal**:
    1. O usuário acessa a lista de reservas
    2. O usuário seleciona a reserva que deseja cancelar
    3. O usuário solicita o cancelamento da reserva
    4. O sistema atualiza o status da reserva para "Cancelada"
    5. O sistema atualiza a disponibilidade do horário da reserva
    6. O sistema envia um e-mail de notificação para o administrador avisando que a reserva foi cancelada
    7. O sistema envia um e-mail de notificação para o usuário avisando que a reserva foi cancelada

#### Cancelar reserva pelo administrador

- **Descrição**: O administrador cancela uma reserva existente
- **Pré-condições**: O usuário deve estar autenticado e ser um administrador
- **Pós-condições**: A reserva é cancelada no sistema
- **Fluxo principal**:
    1. O administrador acessa a lista de reservas
    2. O administrador seleciona a reserva que deseja cancelar
    3. O administrador solicita o cancelamento da reserva
    4. O sistema atualiza o status da reserva para "Cancelada"
    5. O sistema atualiza a disponibilidade do horário da reserva
    6. O sistema envia um e-mail de notificação para o administrador avisando que a reserva foi cancelada
    7. O sistema envia um e-mail de notificação para o usuário avisando que a reserva foi cancelada

#### Aceitar/Recusar reserva

- **Descrição**: O administrador aceita uma reserva pendente
- **Pré-condições**: O usuário deve estar autenticado e ser um administrador
- **Pós-condições**: A reserva é aceita/recusada no sistema
- **Fluxo principal**:
    1. O administrador acessa a lista de reservas pendentes
    2. O administrador seleciona a reserva que deseja aceitar
    3. O administrador solicita a aceitação da reserva
    4. O sistema atualiza o status da reserva
    5. O sistema envia um e-mail de notificação para o usuário avisando que a reserva foi aceita/recusada, caso recusada
       o
       administrador deve informar o motivo da recusa

#### Editar reserva

- **Descrição**: O usuário edita uma reserva existente
- **Pré-condições**: O usuário deve estar autenticado
- **Pós-condições**: A reserva é editada no sistema
- **Fluxo principal**:
    1. O usuário acessa a lista de reservas
    2. O usuário seleciona a reserva que deseja editar
    3. O usuário edita os serviços e/ou horário da reserva
    4. O usuário confirma as alterações
    5. O sistema recalcula o preço total e a duração total da reserva
    6. O sistema atualiza a reserva no banco de dados
    7. O sistema atualiza a disponibilidade do horário da reserva
    8. O sistema envia um e-mail de notificação para o administrador avisando que a reserva foi alterada solicitando
       confirmação
    9. O sistema envia um e-mail para o usuário avisando que a alteração foi realizada com sucesso

### Administração

#### Gerenciar horários

- **Descrição**: O administrador gerencia os horários disponíveis
- **Pré-condições**: O usuário deve estar autenticado e ser um administrador
- **Pós-condições**: Os horários são gerenciados no sistema
- **Fluxo principal**:
    1. O administrador acessa a lista de horários
    2. O administrador adiciona um novo horário
    3. O administrador edita um horário existente
    4. O administrador remove um horário existente
    5. caso o horário possua reservas o sistema deve informar que não é possível excluir o horário, apenas se cancelar a
       reserva

#### Gerenciar serviços

- **Descrição**: O administrador gerencia os serviços disponíveis
- **Pré-condições**: O usuário deve estar autenticado e ser um administrador
- **Pós-condições**: Os serviços são gerenciados no sistema
- **Fluxo principal**:
    1. O administrador acessa a lista de serviços
    2. O administrador adiciona um novo serviço
    3. O administrador edita um serviço existente
    4. O administrador remove um serviço existente
    5. caso o serviço possua reservas o sistema deve informar que não é possível excluir o serviço, apenas se cancelar as
       reservas

#### Gerenciar categorias

- **Descrição**: O administrador gerencia as categorias disponíveis
- **Pré-condições**: O usuário deve estar autenticado e ser um administrador
- **Pós-condições**: As categorias são gerenciadas no sistema
- **Fluxo principal**:
    1. O administrador acessa a lista de categorias
    2. O administrador adiciona uma nova categoria
    3. O administrador edita uma categoria existente
    4. O administrador remove uma categoria existente
    5. caso a categoria possua serviços o sistema deve informar que não é possível excluir a categoria, apenas se excluir
       os serviços

#### Gerenciar usuários

- **Descrição**: O administrador gerencia os usuários do sistema
- **Pré-condições**: O usuário deve estar autenticado e ser um administrador
- **Pós-condições**: Os usuários são gerenciados no sistema
- **Fluxo principal**:
    1. O administrador acessa a lista de usuários
    2. O administrador pode bloquear/desbloquear usuários



## Telas do Sistema
### Gerais
* Tela de Login
* Tela de Registro
* Tela de Recuperação de Senha
* Tela de Confirmação de E-mail
* Tela de Página Inicial
* Tela de Edição de Perfil
* Tela de Listagem de Reservas
* Tela de Detalhes da Reserva
### Administração
* Tela de Listagem de Horários
* Tela de Cadastro de Horário
* Tela de Edição de Horário
* Tela de Listagem de Serviços
* Tela de Cadastro de Serviço
* Tela de Edição de Serviço
* Tela de Listagem de Categorias
* Tela de Cadastro de Categoria
* Tela de Edição de Categoria
* Tela de Listagem de Usuários



