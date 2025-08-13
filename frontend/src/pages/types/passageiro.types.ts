export type StatusOptions = 'A' | 'I' | null;

export interface PassageiroForm {
  nome: string;
  email: string;
  nascimento: Date | null;
  telefone: string;
  status: StatusOptions;
  obs: string;
}
