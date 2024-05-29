export interface User {
    id: number;
    provider: string;
    name: string;
    email: string;
    email_verified_at: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>
> = T & {
    auth: {
        user: User;
    };
    session: {
        close: boolean;
    };
};
