export interface LinksType {
    active: boolean,
    label: string,
    url: string | null,
}

export interface PaginationType<T> {
    current_page: number,
    data: T[],
    first_page_url: string,
    from: number,
    last_page: number,
    last_page_url: string,
    links: LinksType[],
    next_page_url: string | null,
    path: string,
    per_page: number,
    prev_page_url: string | null,
    to: number,
    total: number
}


export interface PaginationComponentType {
    links: LinksType[],
    total: number,
    per_page: number,
    current_page: number,
    last_page: number,
    on_each_side?: number,
    next_page_url: string | null,
    prev_page_url: string | null,
}
