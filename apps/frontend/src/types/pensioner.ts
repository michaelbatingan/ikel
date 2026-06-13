export interface Pensioner {
    id: number;
    serial_number: string;
    control_number: string;
    rank: string;
    first_name: string;
    middle_name: string;
    last_name: string;
    pension_account: string;
    bank_name: string;
    amount_centavos: number;
    retirement_date: Date;
    created_at: string;
    updated_at: string;
}

export type PensionerFormData = Omit<
Pensioner,
 "id" | "created_at" | "updated_at"
  >;


export interface ApiResponse<T> {
    success: boolean;
    data: T;
    message: string; 
}