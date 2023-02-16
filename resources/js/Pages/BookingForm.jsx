import React, { useState } from "react";
import {
    TextField,
    Grid,
    Button,
    Typography,
} from "@mui/material";
import axios from "axios";
import SalesPeopleAppointment from "@/Components/SalesPeopleAppointment";

function BookingForm() {
    const [startDate, setStartDate] = useState("");
    const [endDate, setEndDate] = useState("");
    const [subject, setSubject] = useState("");
    const [errors, setErrors] = useState([]);
    const [success, setSuccess] = useState(false);

    //get the id from the url
    const url = window.location.pathname;
    const segments = url.split('/');
    const idForAxios = segments[2];

    const handleSubmit = (event) => {
        event.preventDefault();
        axios
            .post(`/salespeople/${idForAxios}/appointment/create`, {
                start_appointment_date: startDate,
                end_appointment_date: endDate,
                subject: subject
            })
            .then((response) => {
                setSuccess(true);
            })
            .catch((error) => {
                console.log(error);
                setErrors(error.response.data.message);
            });
    };

    return (
        <>
            <form onSubmit={handleSubmit}>
                <Grid container spacing={2}>
                    <Grid item xs={12} sm={6}>
                        <Typography variant="h6">Start appointment</Typography>
                        <TextField
                            type="datetime-local"
                            required
                            value={startDate}
                            onChange={(e) => setStartDate(e.target.value)}
                            InputLabelProps={{
                                shrink: true,
                            }}
                        />
                    </Grid>
                    <Grid item xs={12} sm={6}>
                        <Typography variant="h6">End appointment</Typography>
                        <TextField
                            type="datetime-local"
                            required
                            value={endDate}
                            onChange={(e) => setEndDate(e.target.value)}
                            InputLabelProps={{
                                shrink: true,
                            }}
                        />
                    </Grid>
                    <Grid item xs={12} sm={6}>
                        <Typography variant="h6">subject</Typography>
                        <TextField
                            type="text"
                            required
                            value={subject}
                            onChange={(e) => setSubject(e.target.value)}
                            InputLabelProps={{
                                shrink: true,
                            }}
                        />
                    </Grid>
                </Grid>
                <br />
                <Button type="submit" variant="contained" color="primary">
                    Réserver
                </Button>
            </form>
            <br />
            {success ? <p>Appointment created</p> : null}
            {errors ? <p>{errors}</p> : null}
<br/>
            <SalesPeopleAppointment id={idForAxios} />
        </>
    );
}

export default BookingForm;
