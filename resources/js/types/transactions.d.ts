export interface Transaction {
    id: number,
    name: string,
    amount: number,
    date: string,
    user_id: number,
    category_id: number,
    category: Category,
    user: User,
    created_at: string,
    updated_at: string,
}

interface Category {
    id: number,
    name: string,
    type: string
}

interface User {
    id: number,
    name: string
}

interface Props {
    transactions: Transaction[];
}
