import moment from 'moment';

// Check if date is today
function isToday(momentDate: any) {
  const yesterday = moment()
    .clone()
    .startOf('day');
  return momentDate.isSame(yesterday, 'd');
}

// Check if date is yesterday
function isYesterday(momentDate: any) {
  const yesterday = moment()
    .clone()
    .subtract(1, 'days')
    .startOf('day');
  return momentDate.isSame(yesterday, 'd');
}

// tslint:disable-next-line:variable-name
export const convertToTimePost = (date: any, DWMY_timeAgo: boolean = true) => {
  // DWMY_timeAgo = [Days,Weeks,Months,Years] ago
  // let momentDate  = moment.unix(timestamp),
  // Getting date and time with unix timestamp
  // Getting date and time with unix timestamp
  // tslint:disable-next-line:one-variable-per-declaration
  const momentDate = moment.utc(date),
    dateTime = {
      seconds: moment().diff(momentDate, 'seconds'),
      minutes: moment().diff(momentDate, 'minutes'),
      hours: moment().diff(momentDate, 'hours'),
      days: moment().diff(momentDate, 'days'),
      weeks: moment().diff(momentDate, 'weeks'),
      months: moment().diff(momentDate, 'months'),
      years: moment().diff(momentDate, 'years'),
      today: isToday(momentDate),
      yesterday: isYesterday(momentDate),
      dayName: momentDate.format('dddd'),
      fullDateTime: momentDate.format('LLLL'),
      date: momentDate.format('LL'),
      time: momentDate.format('LT'),
      calendar: moment(momentDate.format()).calendar(),
    },
    datetime = dateTime.date + ' at ' + dateTime.time;
  let outputTime = 'just now';

  // if (dateTime.seconds > 0) {
  //     outputTime = '1 Second ago';
  // }
  // if (dateTime.seconds > 1) {
  //     outputTime = dateTime.seconds + ' Seconds ago';
  // }
  if (dateTime.seconds > 25) {
    outputTime = dateTime.seconds + ' Seconds ago';
  }

  if (dateTime.minutes === 1) {
    outputTime = '1 Minute ago';
  }
  if (dateTime.minutes > 1) {
    outputTime = dateTime.minutes + ' Minutes ago';
  }

  if (dateTime.hours === 1) {
    outputTime = '1 hour ago';
  }
  if (dateTime.hours > 1) {
    outputTime = dateTime.hours + ' hours ago';
  }

  if (dateTime.days === 1) {
    if (DWMY_timeAgo) {
      outputTime = '1 Day ago';
    } else {
      outputTime = datetime;
    }
  }
  // if (dateTime.days > 1) {
  //     console.log(dateTime)
  //     if (DWMY_timeAgo) {
  //         outputTime = dateTime.days + ' Days ago';
  //     } else {
  //         outputTime = datetime;
  //     }
  // }
  if (dateTime.days > 1) {
    outputTime = dateTime.calendar;
  }

  // //weeks
  // if (dateTime.weeks == 1) {
  //     if (DWMY_timeAgo) {
  //         outputTime = dateTime.weeks + ' Week';
  //     } else {
  //         outputTime = datetime;
  //     }
  // }
  // if (dateTime.weeks > 1) {
  //     if (DWMY_timeAgo) {
  //         outputTime = dateTime.weeks + ' Weeks';
  //     } else {
  //         outputTime = datetime;
  //     }
  // }
  //
  // if (dateTime.months == 1) {
  //     if (DWMY_timeAgo) {
  //         outputTime = '1 Month ago';
  //     } else {
  //         outputTime = datetime;
  //     }
  // }
  // if (dateTime.months > 1) {
  //     if (DWMY_timeAgo) {
  //         outputTime = dateTime.months + ' Months ago';
  //     } else {
  //         outputTime = datetime;
  //     }
  // }
  //
  // if (dateTime.years == 1) {
  //     if (DWMY_timeAgo) {
  //         outputTime = '1 Year ago';
  //     } else {
  //         outputTime = datetime;
  //     }
  // }
  // if (dateTime.years > 1) {
  //     if (DWMY_timeAgo) {
  //         outputTime = dateTime.years + ' Years ago';
  //     } else {
  //         outputTime = datetime;
  //     }
  // }

  // if (dateTime.yesterday) {
  //     outputTime = dateTime.calendar;
  //     // Will show yesterday date
  //     // example: Yesterday at 11:24 PM
  // }

  return outputTime;
};
