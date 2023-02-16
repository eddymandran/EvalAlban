import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import BookingForm from "@/Pages/BookingForm";
import {useState} from "react";
import SalesPeopleList from "@/Components/SalesPeopleList";


export default function Dashboard(props) {
    const [salesPeople, setsalesPeople] = useState("");
    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <SalesPeopleList/>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
