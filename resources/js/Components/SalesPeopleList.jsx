import { useState, useEffect } from 'react';
import axios from 'axios';

export default function SalesPeopleList() {
    const [salesPeoples, setsalesPeoples] = useState("");

    useEffect(() => {
        axios.get('/salespeoles/')
            .then((response) => {
                setsalesPeoples(response.data)
            })
            .catch((error) => {
                console.log(error)
            })
    }, []);

    return (
        <>
            {salesPeoples ? salesPeoples.map((salesPerson) => (
                <li key={salesPerson.id}>
                   <a href={`/salespeople/${salesPerson.id}/`}>{salesPerson.lastname}</a>
                </li>
            )) : null}
        </>
    );
}
