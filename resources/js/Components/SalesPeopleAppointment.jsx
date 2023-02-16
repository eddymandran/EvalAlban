import { useState, useEffect } from 'react';
import axios from 'axios';

export default function SalesPeopleAppointment(props) {
    const [appointments, setAppointments] = useState([]);

    useEffect(() => {
        axios.get(`/salespeople/${props.id}/appointments`)
            .then((response) => {
                setAppointments(response.data)
                console.log(response)
            })
            .catch((error) => {
                console.log(error)
            })
    }, []);

    return (
        <div>
            <h1>List of appointment</h1>
            <ul>
                {appointments.map(appointment => (
                    <li key={appointment.id}>
                        {appointment.start_appointment_date} - {appointment.end_appointment_date} : {appointment.subject}
                    </li>
                ))}
            </ul>
        </div>
    );
}
