/**
 * Composable para submeter dados para um backend Yii 1.1 de forma síncrona,
 * simulando um post de formulário tradicional.
 */
export function useYiiFormSubmit() {
  /**
   * @param url A URL da action do controller Yii.
   * @param data Um objeto JavaScript com os dados do formulário.
   * @param modelName O nome do Model que o Yii espera no array $_POST (ex: 'Passageiro').
   */
  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  const submit = (url: string, data: Record<string, any>, modelName: string) => {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = url;

    // Para cada chave no nosso objeto de dados...
    for (const key in data) {
      const value = data[key];
      if (value !== null && value !== undefined) {
        const input = document.createElement('input');
        input.type = 'hidden';
        // Cria o nome no formato que o Yii espera: ModelName[attribute]
        input.name = `${modelName}[${key}]`; // Ex: Passageiro[nome]
        input.value = value;
        form.appendChild(input);
      }
    }

    // Adiciona o formulário à página e o submete, causando o reload.
    document.body.appendChild(form);
    form.submit();
  };

  return { submit };
}
